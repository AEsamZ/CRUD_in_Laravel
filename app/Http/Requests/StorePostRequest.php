<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        return [
            'title'=>'required|min:3|unique:posts',
            'description'=>'required|min:10',
            'user_id' => 'exists:users,id'
        ];
    }

    public function messages(){
        return [
        'title.required'=>'title required by ahmed',
        'title.min'=>'title minimum 3 characters',
        'title.unique'=>'the title shoud be unique',
        'description.required'=>'description required by ahmed',
        'description.min:10'=>'minimum 10 characters'
        ];
    }
}
