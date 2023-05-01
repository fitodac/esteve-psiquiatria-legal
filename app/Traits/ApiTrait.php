<?php
namespace App\Traits;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Log;

trait ApiTrait {
    private $register_response = [
        'Register' => [
            'KO' => 'Errónea',
            'KO##-1' => 'Error. Usuarios ya existe en WEB',
            'KO##-5' => 'Error. Usuario pendiente de activar',
            'KO##-6' => 'Error. Email formato incorrecto',
        ],
        'Others' => [
            'KO' => 'Errónea',
        ]
    ];

    public function login($email, $password) {
        $response = $this->make_request('Login.do?', [
            'usu_email' => $email,
            'usu_password' => $password,
        ]);

        return $this->response_to_view($response, 'Login');
    }

    public function register($user) {
        $this->check_user_pending_confirmation($user['usu_email']);
        $this->check_free_email($user['usu_email']);

        $response = $this->make_request('RegistroExterno.do?op=AEX&', [
            'usu_email'             => $user['usu_email'],
            'usu_password'          => $user['usu_password'],
            'usu_nombre'            => $user['usu_nombre'],
            'usu_ape1'              => $user['usu_ape1'],
            'usu_ape2'              => $user['usu_ape2'],
            'usu_codperfil'         => $user['usu_codperfil'],
            'usu_codespecialidad'   => $user['usu_codespecialidad'],
            'usu_codpais'           => $user['usu_codpais'],
            'usu_codprovestado'     => $user['usu_codprovestado'],
            'usu_codpoblacion'      => $user['usu_codpoblacion'],
            'usu_ciudad'            => $user['usu_ciudad'],
            'usu_direccion'         => $user['usu_direccion'],
            'usu_cp'                => $user['usu_cp'],
            'usu_telefono'          => $user['usu_telefono'],
            'usu_dni'               => $user['usu_dni'] ?? '',
            'usu_empresa'           => $user['usu_empresa'] ?? '',
            'con'                   => '360',
            'zon'                   => '34',
            'mailing'               => $user['mailing'] ? 'S' : 'N',
        ]);

        $this->response_to_view($response, 'Register');
    }

    public function change_password($email, $pass, $newpass) {
        $response = $this->make_request('Pwd.do?op=MCX&', [
            'usu_email'     => $email,
            'usu_password'  => $pass,
            'usu_newpwd'    => $newpass,
        ]);

        $res = $response->body();

        if($res == 'KO') {
            throw ValidationException::withMessages(['general' => 'No se ha podido cambiar la contraseña']);
        }
    }

    public function user_update($user) {
        $response = $this->make_request('RegistroExterno.do?op=MEX&', [
            'usu_codusuario'        => $user['usu_codusuario'],
            'usu_email'             => $user['usu_email'],
            'usu_nombre'            => $user['usu_nombre'],
            'usu_ape1'              => $user['usu_ape1'],
            'usu_ape2'              => $user['usu_ape2'],
            'usu_codperfil'         => $user['usu_codperfil'],
            'usu_codespecialidad'   => $user['usu_codespecialidad'],
            'usu_numcolegiado'      => $user['usu_numcolegiado'],
            'usu_codpais'           => $user['usu_codpais'],
            'usu_codprovestado'     => $user['usu_codprovestado'],
            'usu_codpoblacion'      => $user['usu_codpoblacion'],
            'usu_ciudad'            => $user['usu_ciudad'],
            'usu_direccion'         => $user['usu_direccion'],
            'usu_cp'                => $user['usu_cp'],
            'usu_telefono'          => $user['usu_telefono'],
            'usu_dni'               => $user['usu_dni'] ?? '',
            'usu_empresa'           => $user['usu_empresa'] ?? '',
            'mailing'               => $user['mailing'] ? 'S' : 'N',
        ]);

        return $this->response_to_view($response, 'Others');
    }

    public function check_free_email($email) {
        $response = $this->make_request('RegistroExterno.do?op=EEX&', [
            'usu_email'         => $email,
        ]);

        $res = $response->body();

        if($res == 'KO') {
            throw ValidationException::withMessages(['duplicateEmail' => 'El correo no se encuentra disponible']);
        }
    }

    public function check_user_pending_confirmation($email) {
        $response = $this->make_request('RegistroExterno.do?op=UPC&', [
            'usu_email'         => $email,
        ]);

        $res = $response->body();

        if($res == 'OK') {
            throw ValidationException::withMessages(['confirmationPending' => 'Usuario pendiente de confirmar']);
        }
    }

    public function resetPassword($email) {
        $response = $this->make_request('Pwd.do?op=RCX&', [
            'usu_email' => $email,
            'zon'       => '34',
            'con'       => '360'
        ]);

        $res = $response->body();

        if($res == 'KO') {
            throw ValidationException::withMessages(['resetPassword' => 'Ocurrió un error. Por favor contacte con nosotros']);
        }
    }


    public function delete_user() {
        $response = $this->make_request('RegistroExterno.do?op=BEX&', [
            'usu_codusuario'    => '',
            'usu_email'         => '',
            'usu_password'      => '',
        ]);
    }

    public function make_request($url, $body) {
        $base_url = config('esteveapi.base_url');

        $params = http_build_query($body);

        return Http::withOptions(['verify' => false])->connectTimeout(5)->post($base_url.$url.$params);

    }

    public function response_to_view($response, $message) {
        $reponse_index = ($message == 'Register') ? 'Register' : 'Others';
        $response_text = $this->register_response;
        $res = $response->body();

        if(array_key_exists($res, $response_text[$reponse_index])) {
            throw ValidationException::withMessages(['general' => $response_text[$reponse_index][$res]]);
        }

        return $res;
    }
}
