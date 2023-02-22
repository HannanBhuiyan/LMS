<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assigncourse extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function relationwithbatch(){
        return $this->belongsTo(Batch::class, 'batch_id', 'id');
    }

    public function relationwithcourse(){
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function relationwithstudent(){
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

}
