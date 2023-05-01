<?php

namespace App\Http\Requests\Admin;

use App\Rules\FilledSpeaker;
use Illuminate\Foundation\Http\FormRequest;

class ModuleCreateEditRequest extends FormRequest
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
            'course_id'         => ['required'],
            'order'             => ['required', 'numeric'],
            'title'             => ['required'],
            'description'       => ['required'],
            'video'             => ['required'],
            'teacher'           => ['required', new FilledSpeaker],
            'tag'               => ['string'],
            'parent_module_id'  => ['']
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
            'course_id'         => 'curso',
            'order'             => 'número del módulo',
            'title'             => 'título',
            'description'       => 'descripción',
            'teacher'           => 'impartido por',
            'tag'               => 'etiqueta',
            'parent_module_id'  => 'módulo padre'
        ];
    }
}
