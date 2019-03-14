<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $id=($this->segment(2));
        return [
            'title'=> 'required|min:3|unique:posts,title,'.$id,
            'description'=>'required|min:10,'.$id,
        ];
    }

    public function messages()
    {
        return[
            'title.required'=>'title required by ahmed',
            'title.min:3'=>'title minimum 3 characters',
            'description.required'=>'description required by ahmed',
            'description.min:10'=>'minimum 10 characters'
        ];
    }
}
