<?php

namespace App\Http\Requests\Admin;

use App\Rules\FilledJson;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ChallengeCreateEditRequest extends FormRequest
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
            'description'       => ['required'],
            'image'             => ['required'],
            'challenge_type'    => ['required'],
            'score'             => ['required', 'numeric'],
            'date_from'         => ['required','date'],
            'date_to'           => ['required','date'],
            'participation'     => ['required_if:challenge_type,visibility',new FilledJson],
            'legal'             => ['required']
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
            'description'       => 'descripción',
            'image'             => 'imagen',
            'challenge_type'    => 'tipo de reto',
            'score'             => 'puntaje',
            'date_from'         => 'fecha desde',
            'date_to'           => 'fecha hasta',
            'participation'     => 'participación',
            'legal'             => 'bases legales'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'date_from' => Carbon::parse($this->date_from)->format('Y-m-d'),
            'date_to' => Carbon::parse($this->date_to)->format('Y-m-d'),
        ]);
    }
}
