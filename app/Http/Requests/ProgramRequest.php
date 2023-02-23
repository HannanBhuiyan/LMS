<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
        
        if(request()->routeIs('programs.store')){
            $imageRules = 'required';
        }elseif(request()->routeIs('programs.update')){
            $imageRules = 'sometimes';
        }
 
        return [
            'course_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => $imageRules,
        ];
    }

    public function messages()
    {
        return [
            'course_id.required' => 'Course name is required',
        ];
    }

     
}
