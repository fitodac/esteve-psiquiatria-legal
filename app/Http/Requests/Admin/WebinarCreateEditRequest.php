<?php

namespace App\Http\Requests\Admin;

use App\Rules\FilledJson;
use App\Rules\FilledSpeaker;
use Illuminate\Foundation\Http\FormRequest;

class WebinarCreateEditRequest extends FormRequest
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
            'title'             => ['required'],
            'subtitle'          => ['required'],
            'description'       => ['required'],
            'speaker'           => ['required', new FilledSpeaker],
            'schedule'          => ['required', new FilledJson],
            'image'             => ['required'],
            'appointment_day'   => ['required'],
            'appointment_hour'  => ['required'],
            'registration_form' => ['required', 'url'],
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
            'title'             => 'título',
            'subtitle'          => 'subtítulo',
            'description'       => 'descripción',
            'speaker'           => 'impartido por',
            'image'             => 'imagen',
            'appointment_day'   => 'día',
            'appointment_hour'  => 'hora',
            'schedule'          => 'agenda',
            'registration_form' => 'url del formulario de registro',
        ];
    }
}
