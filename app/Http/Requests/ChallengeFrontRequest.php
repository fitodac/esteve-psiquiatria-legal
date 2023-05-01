<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChallengeFrontRequest extends FormRequest
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
            'challenge_id' => ['required'],
            'challenge_type' => ['required'],
            'score' => ['required'],
            'upload_type' => ['required_if:challenge_type,recommendation'],
            'date_start' => ['required_if:challenge_type,recommendation'],
            'date_end' => ['required_if:challenge_type,recommendation'],
            'products' => ['required_if:challenge_type,recommendation'],
            'file' => ['required'],
            'mailing' => ['required'],
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
            'upload_type'       => 'tipo de adjunto',
            'date_start'        => 'fecha inicio',
            'date_end'          => 'fecha hasta',
            'file'              => 'adjunto',
            'products'          => 'productos'
        ];
    }

    public function messages()
    {
        return [
            'upload_type.required_if'   => __('El campo :attribute es obligatorio'),
            'date_start.required_if'    => __('El campo :attribute es obligatorio'),
            'date_end.required_if'      => __('El campo :attribute es obligatorio'),
            'products.required_if'      => __('El campo :attribute es obligatorio'),
        ];
    }
}
