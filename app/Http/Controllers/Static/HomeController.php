<?php

namespace App\Http\Controllers\Static;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\GlobalContent;
use App\Models\Podcast;
use App\Models\Video;
use App\Models\Team;


class HomeController extends Controller
{

	public function index() {

		$intro = '<p class="text-lg mt-6">
								<span class="text-brand-pink font-bold">ESTEVE te 
								acerca, "Hablemos de Psiquiatría 
								Legal"</span> donde tratamos los <strong>
								temas más habituales relacionados con la 
								psiquiatría legal y forense, como el suicidio, 
								los menores o medidas coercitivas</strong>.
							</p>
							<p class="text-lg mt-6">
								Todo esto de la mano de un <strong>comité experto</strong> 
								formado por <strong>Dr. Julio Guija</strong>, del 
								departamento de Psiquiatría Forense del Instituto de 
								Medicina Legal de Sevilla; <strong>Dr. Lucas Giner</strong>, 
								del servicio de Psiquiatría de la Universidad 
								de Sevilla; Y <strong>Mgda. María Núnez</strong>. 
								Magistrada de Juzgados de instrucción nº6 de Sevilla.
							</p>';

		
		$cards = [
			'cards' => [
				[
					'id' => uuid_create(),
					'img' => 'icon1',
					'title' => '1. DESCUBRE',
					'content' => '<p>
													Mensualmente trataremos 
													<strong>una situación diferente</strong> 
													sobre la que puedes hacer una 
													<strong>consulta</strong>.
												</p>

												<p class="mt-3">
													Si lo prefieres, también puedes mirar 
													o escuchar <strong>las situaciones 
													tratadas anteriormente</strong>.
												</p>',
					'color' => 'blue'
				],
				[
					'id' => uuid_create(),
					'img' => 'icon2',
					'title' => '2. ENVÍA',
					'content' => '<p>
													Comparte tu duda o comentario sobre 
													la situación de cada mes con el 
													comité de profesionales y participa 
													en la creación de nuestros podcasts.
												</p>',
					'color' => 'pink'
				],
				[
					'id' => uuid_create(),
					'img' => 'icon3',
					'title' => '3. ESCUCHA',
					'content' => '<p>
													A final de cada mes publicaremos 
													un nuevo <strong>podcast</strong> 
													en el que daremos 
													<strong>respuesta</strong> a las 
													consultas más frecuentes y relevantes 
													relacionadas con cada situación.
												</p>',
					'color' => 'blue'
				]
			],
			'cta_title' => 'Realizar una consulta',
			'cta_link' => '#',
		];



		$banner1 = [
			'title' => '¿PSIQUIATRÍA LEGAL<br>Y PSIQUIATRÍA FORENSE?',
			'content' => '<strong>Te lo explicamos,</strong><br>
										así como la normativa actual en España',
			'cta_title' => 'Acceder',
			'cta_link' => '/login'
		];



		$banner2 = [
			'title' => 'Frente a la depresión y la ansiedad<br>
									<strong>
										Xeristar&reg; expande su luz con<br>
										una gama más amplia.
									</strong>',
			'cta' => 'Conoce sus beneficios para profesionales 
								sanitarios y pacientes',
			'link' => 'xeristar'
		];



		$team = [
			'title' => 'Conoce a los profesionales que forman el Comité',
			'people' => Team::all()
		];


		return Inertia::render('Home', [
			'intro' => $intro,
			'cards' => $cards,
			'banner1' => $banner1,
			'team' => $team,
			'banner2' => $banner2,
			'podcasts' => [
				'title' => GlobalContent::whereType('podcast_title')->first()->content,
				'items' => Podcast::all()
			],
			'videos' => [
				'title' => 'Si lo prefieres, puedes ver vídeos 
										de situaciones ya tratadas',
				'items' => Video::all()
			]
		]);
	}

}
