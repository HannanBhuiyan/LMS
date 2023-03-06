<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramContent extends Model
{
    use HasFactory;


    public function relationWithCourse()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
 
    
}
