<?php

namespace App\Http\Requests\Admin;

use App\Rules\QuestionRules;
use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateEditRequest extends FormRequest
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
            'module_id' => ['required'],
            'question'  => ['required'],
            'answers'   => ['required', new QuestionRules]
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'module_id'         => 'módulo',
            'question'          => 'pregunta',
            'answers'           => 'respuestas'
        ];
    }
}
