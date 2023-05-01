<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Pharmacy;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use Illuminate\Validation\ValidationException;

use App\Models\Specialty;
use App\Models\Country;
use App\Models\Population;
use App\Models\Province;
use App\Models\Profile;

class RegisteredUserController extends Controller
{
    use ApiTrait;
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {

			$intro = [
				'title' => 'REGISTRO',
				'intro' => '<div class="text-gray-500 leading-tight">
											Gracias por tu interés en HABLEMOS DE
											PSIQUIATRÍA LEGAL.<br>Por favor introduce
											tus datos.
										</div>',
				'content' => 'Si ya estás dado de alta en Hablemos de Psiquiatría Legal o
											ESTEVE ÁGORA, haz
											<a
												href="/login"
												class="text-brand-blue hover:underline">log-in</a>
											con tu usuario y contraseña.'
			];

			return Inertia::render('Auth/Register', [
				'intro' => $intro,
				'countries_dropdown_options' => Country::all(),
				'provinces_dropdown_options' => Province::all(),
				'population_dropdown_options' => Population::all(),
				'profile_dropdown_options' => Profile::all(),
				'specialty_dropdown_options' => Specialty::all()
			]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {

        $user = $request->all();

        $rol = Role::where('short_name', $user['usu_codperfil'])->first();

        $user['usu_codperfil'] = 'ME';

        $this->register($user);

        $userModel = User::create([
            'email' => $user['usu_email'],
            'name' => $user['usu_nombre'].' '.$user['usu_ape1'],
        ]);

        $userModel->assignRole($rol->id);

        event(new Registered($userModel));

        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update(UpdateUserRequest $request)
    {
        $response = $this->user_update($request->input());

        $user = Auth::user();

        session(['user' => json_encode($request->input())]);

        return redirect()->route('my-account')->with('message', 'Se ha actualizado con éxito');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

}
