<?php

namespace App\Http\Controllers\Auth;

use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    use ApiTrait;
    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'password' => ['required'],
            'new_password' => ['required'],
        ]);

        $user = Auth::user();

        $this->change_password($user->email, $validated['password'], $validated['new_password']);

        return redirect()->route('my-account')->with('message', 'Se ha actualizado con éxito');
    }

    public function reset(Request $request) {
        $validated = $request->validate([
            'usu_email' => ['required', 'email'],
        ]);

        $this->resetPassword($validated['usu_email']);

        return redirect()->route('password.request')->with('message', 'Hemos enviado por correo electrónico un enlace de restablecimiento de contraseña');
    }
}
