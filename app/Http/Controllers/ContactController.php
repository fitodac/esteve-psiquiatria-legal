<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Specialty;


class ContactController extends Controller
{

	public function index() {
		
		$intro = [
			'title' => 'Contacto',
			'intro' => '<span class="text-gray-600">
										Contáctanos mediante el formulario 
										que tienes a continuación:
									</span>'
		];

		return Inertia::render('Contact', [
			'intro' => $intro,
			'specialty_options' => Specialty::all()
		]);
	}



	public function store(Request $request) {
		\Log::info($request);

		$this->validate($request, [
			'name' 					=> 'required|string',
			'lastname' 			=> 'required|string',
			'email' 				=> 'required|email',
			'phone' 				=> 'required',
			'message' 			=> 'required',
			'acceptance' 		=> 'accepted|boolean'
		], [], [
			'name' 					=> 'nombre',
			'lastname' 			=> 'apellido',
			'email' 				=> 'correo electrónico',
			'speciality' 		=> 'especialidad',
			'work_center' 	=> 'centro de trabajo',
			'phone' 				=> 'teléfono',
			'message' 			=> 'mensaje',
			'acceptance' 		=> 'politicas de privacidad'
		]);

		$from = config('mail.from.address');
		$to = env('MAIL_TO_ADDRESS');

		try {
			Mail::send('mail', array(
				'name' => $request->get('name'),
				'lastname' => $request->get('lastname'),
				'email' => $request->get('email'),
				'speciality' => $request->get('speciality'),
				'work_center' => $request->get('work_center'),
				'phone' => $request->get('phone'),
				'body' => $request->get('message'),
			), function($message) use ($from, $to){
				$message->from($from);
				$message->to($to)->subject('Formulario de contacto');
			});

				$message = [
					'status' => 'green',
					'content' => 'Hemos recibido su mensaje y nos gustaría darle las gracias por escribirnos.'
				];
		} catch (\Throwable $th) {
			//throw $th;
			\Log::info($th);
			$message = [
				'status' => 'red',
				'content' => 'No hemos podido enviar el mensaje'
			];
		}

		return redirect()->route('contact')->with('message', $message);
	}
}
