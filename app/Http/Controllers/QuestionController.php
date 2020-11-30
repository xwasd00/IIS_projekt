<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('is_profesor');

    }

    protected function createQ(Question $data)
    {
        $qst = Question::create([
            'test_id' => $data['test_id'],
            'name' => $data['name'],
            'task' => $data['task'],
            'scoreMax' => $data['scoreMax'],
            'imagePath' => $data['imagePath'],
        ]);

        return $qst;
    }

    protected function createA(Answer $data)
    {
        $ans = Answer::create([
            'question_id' => $data['question_id'],
            'answer' => $data['answer'],
            'true' => $data['true'],
        ]);

        return $ans;
    }

    public function deleteQ($id)
    {
        $qst = Question::findOrFail($id);

        $test = Test::findOrFail($qst->test_id);
        Question::destroy($id);

        return view('profesor.show', ['test' => $test]);
    }

    public function deleteA($id)
    {
        $ans = Answer::findOrFail($id);
        $qst = Question::findOrFail($ans->question_id);
        Answer::destroy($id);

        return view('profesor.modifyqst', ['qst' => $qst]);
    }

    public function modify($id, Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'task' => 'required',
            'scoreMax' => 'required'
        ]);

        $qst = Question::where('id', $id)->update([
            'name' => $request->name,
            'task' => $request->task,
            'scoreMax' => $request->scoreMax
        ]);

        $qst = Question::findOrFail($id);

        return view('profesor.modifyqst', ['qst'=>$qst]);
    }

    protected function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
        {
            $name = !is_null($filename) ? $filename : Str::random(25);

            $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

            return $file;
        }

    public function add($id ,Request $request)
    {
           $data = request()->validate([
                'name' => 'required',
                'task' => 'required',
                'scoreMax' => 'required',
                'answer' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
           ]);

           $test = Test::findOrFail($id);
           $qst = new Question;
           $qst->imagePath = "";
            if($request->has('image')){
                $image = $request->file('image');

                $name = $request->name.'_'.time();

                $folder = 'images/';
                $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                $this->uploadOne($image, $folder, 'public', $name);
                $qst->imagePath = $filePath;
            }
           $qst->test_id = $test->id;
           $qst->name = $request->name;
           $qst->task = $request->task;
           $qst->scoreMax = $request->scoreMax;

           $qstTmp = $this->createQ($qst);



           switch($test->configuration){
                case 1:
                   $ans = new Answer;
                   $ans->question_id = $qstTmp->id;
                   $ans->answer = $request->answer[0];
                   $ans->true = 1;
                   $this->createA($ans);
                    break;
                case 2:
                    foreach($request->answer as $answer){
                       $ans = new Answer;
                       $ans->question_id = $qstTmp->id;
                       $ans->answer = $answer;
                       $ans->true = 0;
                       $this->createA($ans);
                    }
                    $ansR = new Answer;
                    $ansR->question_id = $qstTmp->id;
                    $ansR->answer = $request->answerR;
                    $ansR->true = 1;
                    $this->createA($ansR);
                    break;
                case 3:
                $ansTrue = $request->ansTrue;
                    foreach($request->answer as $index => $answer){
                        $ans = new Answer;
                        $ans->question_id = $qstTmp->id;
                        $ans->answer = $answer;
                        $ans->true = $ansTrue[$index];
                        $this->createA($ans);
                    }
                    break;
           }

           return view('profesor.show', ['test' => $test]);
    }
}
