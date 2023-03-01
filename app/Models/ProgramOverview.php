<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramOverview extends Model
{
    use HasFactory;

    public function relationWithCourse(){
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
