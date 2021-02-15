<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NotepadUpdateRequest extends FormRequest
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
            'title' => 'sometimes|required',
            'description' => 'sometimes|required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo título é obrigatório!',
            'description.required' => 'O campo descrição é obrigatório!',
        ];
    }
}
