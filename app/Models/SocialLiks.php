<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLiks extends Model
{
    use HasFactory;
    protected $fillable = ['facebook', 'twitter', 'instragram', 'linkedin', 'youtube', 'telegram'];
}

 