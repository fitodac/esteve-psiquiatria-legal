<?php

namespace App\Http\Controllers\Static;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\GlobalContent;
use App\Models\Podcast;
use App\Models\Video;


class AboutController extends Controller
{

  public function index() {

		$intro = [
			'title' => 'Sobre "Hablemos de Psiquiatría legal"',
			'intro' => 'Los problemas legales en psiquiatría, 
								con frecuencia, generan malestar por el 
								desconocimiento por parte del psiquiatra de 
								ciertas cuestiones legales.',
			'content' => '“Hablemos” te ofrece la posibilidad de 
									realizar consultas sobre situaciones que 
									pueden ocurrir en la práctica clínica, 
									de la mano de profesionales que abordan 
									diariamente estos casos.'
		];

		$cards_title = 'El psiquiatra y la psicopatología';
	
		$cards = [
			[
				'id' => uuid_create(),
				'img' => 'icon1',
				'content' => '<strong>El psiquiatra es el 
											profesional de la salud que más 
											contacto tiene con los tribunales 
											de justicia y con las normas 
											jurídicas en general</strong>, 
											dadas las especiales características 
											de los pacientes que trata.'
			],
			[
				'id' => uuid_create(),
				'img' => 'icon2',
				'content' => '<strong>La autonomía de la 
											persona es el elemento nuclear 
											sobre el que gira la 
											asistencia</strong> y esta, a 
											su vez, se sustenta en la voluntad 
											y la capacidad de decidir. ',
			],
			[
				'id' => uuid_create(),
				'img' => 'icon3',
				'content' => '<strong>La psicopatología 
											puede modificar estos requisitos 
											recogidos en las diferentes 
											normativas</strong>, motivo por el 
											que el profesional de la psiquiatría 
											debe conocer y ser especialmente 
											cuidadoso con estos requisitos.'
			]
		];


		$page_content = [
			'title' => 'Sin llegar a requerir grandes 
									conocimientos<br>de Derecho, sí 
									es necesaria:',
			'blocks' => [
				[
					'id' => uuid_create(),
					'content' => '<strong>La observancia de determinadas 
												normas las cuales debe conocer en aras 
												a la buena atención sanitaria</strong> 
												cuidando de preservar los derechos y 
												la dignidad del paciente.'
				],
				[
					'id' => uuid_create(),
					'content' => '<strong>Conocer situaciones de nuestra 
												práctica clínica que pueden derivar 
												en demandas por responsabilidad 
												profesional.</strong>'
				]
			],
			'quote' => 'Pretendemos aportar sugerencias 
									que ayuden a comprender el motivo de 
									estas demandas, así como las conductas 
									para evitarlas en la medida de lo posible',
			'content_title' => 'No sólo es necesario 
													el conocimiento de normativa a 
													la hora del abordaje terapéutico.',
			'content' => '<p>
											<strong>El paciente psiquiátrico</strong>, 
											especialmente en caso de trastorno 
											mental grave descompensado, o por 
											problemas de trastornos de 
											personalidad o de adicciones, 
											<strong>tiene contacto con los 
											tribunales de justicia de manera 
											habitual.</strong>
										</p>
										<p class="mt-8">
											En estos casos es frecuente la 
											<strong>solicitud de información 
											a las Unidades de Hospitalización o 
											los Equipos de Salud Mental</strong> 
											y también, en ocasiones, la asistencia 
											a juicio, lo que nos lleva a la 
											tesitura de plantearnos:
										</p>',
			'steps' => [
				[
					'id' => uuid_create(),
					'text' => '¿Cómo actuar?'
				],
				[
					'id' => uuid_create(),
					'text' => '¿De qué informar?'
				],
				[
					'id' => uuid_create(),
					'text' => '¿Cuáles son los límites del secreto médico?'
				],
			],
			'quote_secondary' => 'Tratamos de aportar los 
														conocimientos psiquiátrico-legales 
														y forenses a la práctica clínica'
		];


		$featured = 'En <strong>"Hablemos de Psiquiatría Legal" 
								pretendemos</strong>, abordando una serie de 
								temas ya establecidos, <strong>ser útiles 
								dando unas normas fácilmente entendibles 
								y de manejo simplificado</strong> en aras 
								de evitar el malestar que la ignorancia de 
								estas normas o pautas puede conllevar.';



		return Inertia::render('About', [
			'intro' => $intro,
			'cards_title' => $cards_title,
			'cards' => $cards,
			'page_content' => $page_content,
			'featured' => $featured,
			'banner_footer' => [
				'title' => GlobalContent::whereType('podcasts_banner_title')->first()->content,
				'btn_text' => GlobalContent::whereType('podcasts_banner_btn_text')->first()->content,
				'btn_link' => GlobalContent::whereType('podcasts_banner_btn_link')->first()->content,
			],
			'podcasts' => [
				'title' => GlobalContent::whereType('podcast_title')->first()->content,
				'items' => Podcast::all()
			]
		]);
	}
}
