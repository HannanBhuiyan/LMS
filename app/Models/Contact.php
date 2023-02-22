<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $contacts = [
        'name' => CleanHtmlInput::class,
        'email' => CleanHtmlInput::class,
        'phone' => CleanHtmlInput::class,
        'message' => CleanHtmlInput::class,

    ];
}
