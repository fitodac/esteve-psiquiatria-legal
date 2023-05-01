<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ResourceEditRequest extends FormRequest
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
            'material'          => ['required'],
            'category_id'       => ['required'],
            'content_type_id'   => ['required'],
            'channel_id'        => ['required'],
            'products'          => ['required'],
            'link'              => [
                'required',
                Rule::when($this->file, 'base64mimes:pdf,png,jpg,jpeg,zip')],
            'image'             => [
                'required',
                Rule::when($this->url, 'base64mimes:png,jpg,jpeg')
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
            'category_id'       => 'categoría',
            'products'          => 'productos',
            'content_type_id'   => 'tipo de contenido',
            'channel_id'        => 'canal',
            'link'              => 'enlace',
            'image'             => 'imagen',
        ];
    }
}
