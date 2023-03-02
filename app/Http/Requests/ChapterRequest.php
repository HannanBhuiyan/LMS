<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'course_id' => 'required',
            'batch_id' => 'required',
            'chapter_name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'chapter_name.required' => 'Chapter name is required',
        ];
    }
    
}
