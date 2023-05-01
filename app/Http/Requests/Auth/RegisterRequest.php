<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'usu_email' => ['required','string','email','max:255'],
            'usu_password' => ['required', 'confirmed'],
            'usu_nombre' => ['required'],
            'usu_ape1' => ['required'],
            'usu_ape2' => ['string','nullable'],
            'usu_codperfil' => ['required'],
            'usu_codespecialidad' => ['required'],
            'usu_codpais' => ['required'],
            'usu_codprovestado' => ['required'],
            'usu_codpoblacion' => ['required'],
            'usu_ciudad' => ['required'],
            'usu_direccion' => ['required'],
            'usu_cp' => ['required'],
            'usu_telefono' => ['required'],
            'usu_empresa' => ['string','nullable'],
            'mailing' => ['boolean'],
            'terms' => 'accepted'
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
            'usu_email' => 'correo electrónico',
            'usu_password' => 'contraseña',
            'usu_nombre' => 'nombre',
            'usu_ape1' => 'apellido',
            'usu_ape2' => 'apellido',
            'usu_codperfil' => 'código del perfil del usuario',
            'usu_codespecialidad' => 'código de la especialidad',
            'usu_codpais' => 'código del país',
            'usu_codprovestado' => 'código de la provincia',
            'usu_codpoblacion' => 'código de la población',
            'usu_ciudad' => 'nombre de la población',
            'usu_direccion' => 'dirección',
            'usu_cp' => 'código Postal',
            'usu_telefono' => 'nº de Teléfono',
            'usu_empresa' => 'Centro de trabajo',
            'mailing' => 'indicador de recibir correo comercial',
            'terms' => 'términos y condiciones'
        ];
    }
}
