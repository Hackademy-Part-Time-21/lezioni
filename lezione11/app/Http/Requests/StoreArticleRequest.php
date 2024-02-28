<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //rendere true questo valore 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                    'title'=>'required|max:50' , 
                    'content' => 'required|max:500'
                ];
    }


    public function messages()
    {
        return [
            'title.required'=>'Il titolo è richiesto',
            'title.max'=>'Il titolo è troppo lungo',
            'content.required'=>'Il contenuto è richiesto',
            'content.max'=>'Il contenuto è troppo lungo'
        ];
    }
}
