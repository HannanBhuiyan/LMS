<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_content extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function relationWithblog()
    {
        return $this->belongsTo(Blog::class,'blog_id','id');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class,'chapter_id','id');
    }
}
