<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'usu_codusuario' => ['required'],
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
            'usu_dni' => ['string','nullable'],
            'usu_empresa' => ['string','nullable'],
            'mailing' => ['boolean']
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
            'usu_codusuario' => 'código del usuario',
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
            'usu_dni' => 'DNI',
            'usu_empresa' => 'Centro de trabajo',
            'mailing' => 'indicador de recibir correo comercial',
        ];
    }
}
