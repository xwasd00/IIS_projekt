<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class StudentAnswer extends Model
{
    use Notifiable;

    protected $fillable = [
        'question_id','answer','test_instance_id',
    ];

    public function test_instance(){
        return $this->belongsTo(TestInstance::class, 'test_instance_id');
    }
}
