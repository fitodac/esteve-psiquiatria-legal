<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Redirect;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
			
			$intro = [
				'title' => 'Inicia sesión',
				'intro' => 'Si ya estás dado de alta en Canal 
										SNC o ESTEVE ÁGORA introduce tu 
										usuario y contraseña.'
			];

			return Inertia::render('Auth/Login', [
				'intro' => $intro,
				'canResetPassword' => Route::has('password.request'),
				'status' => session('status'),
			]);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
			$response = $request->authenticate();

			$request->session()->regenerate();

			session(['user' => json_encode($response)]);

			return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
			Auth::guard('web')->logout();

			$request->session()->invalidate();

			$request->session()->regenerateToken();

			return redirect('/');
    }
}
