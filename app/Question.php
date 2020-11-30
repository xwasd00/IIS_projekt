<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Question
 *
 * @property int $id
 * @property int $test_id
 * @property string $name
 * @property string $task
 * @property string|null $image
 * @property int $scoreMax
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Answer[] $answers
 * @property-read int|null $answers_count
 * @property-read \App\Test $test
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereScoreMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereTask($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereTestId($value)
 * @mixin \Eloquent
 */
class Question extends Model
{
    use Notifiable;


    protected $fillable = [
        'test_id', 'name', 'task', 'scoreMax', 'imageName', 'imagePath',
    ];
    public function test(){
        return $this->belongsTo(Test::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }


}
