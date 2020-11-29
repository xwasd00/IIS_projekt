<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestInstance extends Model
{
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
