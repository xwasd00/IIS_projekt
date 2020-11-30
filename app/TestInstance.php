<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TestInstance extends Model
{

    use Notifiable;

    protected $fillable = [
        'test_id','user_id', 'score', 'evaluated','finished',
    ];
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function student_answers()
    {
        return $this->hasMany(StudentAnswer::class);
    }
}
