<?php

namespace App\Http\Requests\Admin;

use App\Rules\FilledSpeaker;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CoursesCreateEditRequest extends FormRequest
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
            'name'              => ['required'],
            'format_id'         => ['required'],
            'short_description' => ['required'],
            'long_description'  => ['required'],
            'score'             => [
                'required_if:format_id,1',
                Rule::when($this->format_id == 1, 'numeric'),
            ],
            'title'             => ['required'],
            'subtitle'          => ['required'],
            'category_id'       => ['required'],
            'teacher'           => ['required', new FilledSpeaker],
            'image'             => ['required'],
            'video'             => [
                'required_if:format_id,2',
                Rule::when($this->format_id == 2, 'url'),
            ],
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
            'name'              => 'nombre',
            'short_description' => 'descripción corta',
            'long_description'  => 'descripción larga',
            'score'             => 'puntaje',
            'title'             => 'título',
            'subtitle'          => 'subtítulo',
            'category_id'       => 'categoría',
            'teacher'           => 'impartido por',
            'image'             => 'imagen'
        ];
    }

    public function messages()
    {
        return [
            'video.required_if'   => __('El campo :attribute es obligatorio si el formato es Webinar'),
        ];
    }
}
