<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use App\Traits\ApiTrait;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    use ApiTrait;

    private $responseKey = [
        'usu_codusuario' => 'usu_codusuario',
        'usu_email' => 'usu_email',
        'usu_nombre' => 'usu_nombre',
        'usu_ape1' => 'usu_ape1',
        'usu_ape2' => 'usu_ape2',
        'usu_perfil' => 'usu_codperfil',
        'usu_especialidad' => 'usu_codespecialidad',
        'usu_numcolegiado' => 'usu_numcolegiado',
        'usu_pais' => 'usu_codpais',
        'usu_provincia' => 'usu_codprovestado',
        'usu_poblacion' => 'usu_codpoblacion',
        'usu_ciudad' => 'usu_ciudad',
        'usu_direccion' => 'usu_direccion',
        'usu_cp' => 'usu_cp',
        'usu_telefono' => 'usu_telefono',
        'usu_fax' => 'usu_fax',
        'usu_dni' => 'usu_dni',
        'usu_empresa' => 'usu_empresa',
        'usu_tipo' => 'usu_tipo',
        'mailing' => 'mailing',
    ];

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
            'usu_email' => ['required', 'string', 'email'],
            'usu_password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        if(App::environment('local')) {
            $response = $this->tempLogin($this->input('usu_email'));
        } else {
            $response = $this->login($this->input('usu_email'), $this->input('usu_password'));
        }

        $user = User::where('email', trim($this->input('usu_email')))->first();

        $updatedResponse = $this->responseUpdate($response);

        if(!$user) {
            Log::info([$this->input('usu_email'), 'el usuario no existe en la db local', $response]);

            $rol = 'medico';

            $user = User::create([
                'email' => $updatedResponse['usu_email'],
                'name' => $updatedResponse['usu_nombre'] . ' ' . $updatedResponse['usu_ape1']
            ]);

            $user->syncRoles([$rol]);
        }

        Auth::login($user);

        return array_merge($updatedResponse, [
            'role' => $user->roles->first() ? $user->roles->first()['name'] : ''
        ]);
    }

    public function tempLogin($email) {
        return "usu_codusuario=2;usu_email=$email;usu_nombre=Grupo;usu_ape1=Esteve;usu_ape2=;usu_perfil=FA;usu_especialidad=0;usu_numcolegiado=;usu_pais=042;usu_provincia=08;usu_poblacion=019;usu_ciudad=Barcelona;usu_direccion=;usu_cp=;usu_telefono=;usu_dni=;usu_fax=;usu_empresa=;usu_tipo=T;mailing=S";
    }

    public function responseUpdate($response) {
        $csv_res = str_getcsv(mb_convert_encoding($response, "UTF-8", "HTML-ENTITIES"), ';');
        foreach ($csv_res as $data) {
            [$key, $value] = explode('=', $data);
            $user[$this->responseKey[$key]] = $value;
        }

        return $user;
    }
}
