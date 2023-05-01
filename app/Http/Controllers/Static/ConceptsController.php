<?php

namespace App\Http\Controllers\Static;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\GlobalContent;
use App\Models\Podcast;
use App\Models\Video;


class ConceptsController extends Controller
{

	public function index() {
		
		$intro = [
			'title' => 'Psiquiatría Legal VS Psiquiatría Forense',
			'intro' => '<p class="text-gray-500">
										Tanto la <strong>psiquiatría legal</strong> 
										como la <strong>psiquiatría forense</strong> 
										requieren de dos ciencias:
									</p>',
			'content' => '<p class="text-brand-pink text-xl font-bold lg:text-2xl lg:leading-tight">
											¿Pero cuales son las diferencias<br>
											en sus respectivos campos de aplicación?
										</p>'
		];



		$lists = [
			[
				'id' => uuid_create(),
				'image' => 'icon1',
				'title' => 'Psiquiatría legal',
				'list' => [
					[
						'id' => uuid_create(),
						'content' => 'Se ocupa de las 
						<strong class="text-brand-pink">
						normas legislativas
						</strong> 
						que debe conocer el psiquiatra en su 
						praxis clínica. Por ejemplo:',
						'ul' => [
							'Ingreso involuntario',
							'Medidas coercitivas',
							'Apoyos a las personas con discapacidad',
							'Secreto médico'
						]
					],
					[
						'id' => uuid_create(),
						'content' => 'Requiere de conocimiento de la 
						psiquiatría y de las normas legislativas 
						<strong class="text-brand-pink">
						enfocado a la teórica.
						</strong>'
					],
					[
						'id' => uuid_create(),
						'content' => 'Redunda en 
						<strong class="text-brand-pink">
						beneficio del psiquiatra y del paciente.
						</strong>'
					]
				]
			],
			[
				'id' => uuid_create(),
				'image' => 'icon2',
				'title' => 'Psiquiatría forense',
				'list' => [
					[
						'id' => uuid_create(),
						'content' => 'El psiquiatra se convierte en
							<strong class="text-brand-pink">
							asesor de los tribunales de justicia
							</strong>
							y asesorará en las diferentes 
							jurisdicciones:',
							'ul' => [
								'Penal',
								'Civil',
								'Laboral',
								'Contencioso-administrativo',
								'E incluso militar',
							]
					],
					[
						'id' => uuid_create(),
						'content' => 'Requiere de conocimiento de
							la psiquiatría y de las normas 
							legislativas 
							<strong class="text-brand-pink">
							enfocado a la práctica.
							</strong>'
					],
					[
						'id' => uuid_create(),
						'content' => 'Redunda en 
							<strong class="text-brand-pink">
							beneficio de los tribunales de 
							justicia 
							</strong> y, sobre todo,
							<strong class="text-brand-pink">
							del paciente.
							</strong>'
					]
				]
			]
		];


		$page_content = [
			'title' => 'Normativa',
			'list' => [
				[
					'id' => uuid_create(),
					'title' => 'Ingresos involuntarios de 
											pacientes por razón de 
											trastorno psíquico.',
					'description' => 'Artículo 763 de la Ley de 
														Enjuiciamiento Civil',
					'button' => [
						'text' => 'Ir al enlace',
						'link' => 'https://noticias.juridicas.com/base_datos/Privado/l1-2000.l4t1.html'
					]
				],
				[
					'id' => uuid_create(),
					'title' => 'Ley de Autonomía del paciente. 
											Ley 41/2002, de 14 de noviembre, 
											básica reguladora de la autonomía 
											del paciente y de derechos y 
											obligaciones en materia de 
											información y documentación clínica.',
					'description' => 'Especialmente, lo referente 
														al consentimiento informado y 
														por representación y las 
														instrucciones previas. 
														Artículos 9-11.',
					'button' => [
						'text' => 'Ir al enlace',
						'link' => 'https://www.boe.es/buscar/pdf/2002/BOE-A-2002-22188-consolidado.pdf'
					]
				],
				[
					'id' => uuid_create(),
					'title' => 'Ley Orgánica 8/2015, de 22 de 
											julio, de modificación del sistema 
											de protección a la infancia y a la 
											adolescencia.',
					'description' => 'Especial referencia a los 
														centros de protección específicos 
														de menores con problemas de 
														conducta y a las medidas de 
														contención.',
					'button' => [
						'text' => 'Ir al enlace',
						'link' => 'https://www.boe.es/boe/dias/2015/07/23/pdfs/BOE-A-2015-8222.pdf'
					]
				],
				[
					'id' => uuid_create(),
					'title' => 'Código de deontología médica (2011)',
					'description' => 'El nuevo Código es de publicación 
														inminente según la información 
														facilitada.',
					'button' => [
						'text' => 'Ir al enlace',
						'link' => 'https://www.cgcom.es/sites/main/files/files/2022-03/codigo_deontologia_medica.pdf'
					]
				],
				[
					'id' => uuid_create(),
					'title' => 'Eximentes y atenuantes de 
											responsabilidad penal.',
					'description' => 'Artículo 20 y 21 del código Penal',
					'button' => [
						'text' => 'Ir al enlace',
						'link' => 'https://noticias.juridicas.com/base_datos/Penal/lo10-1995.l1t1.html'
					]
				],
				[
					'id' => uuid_create(),
					'title' => 'Medidas de seguridad',
					'description' => 'Articulo 95-106 del Código Penal',
					'button' => [
						'text' => 'Ir al enlace',
						'link' => 'https://noticias.juridicas.com/base_datos/Penal/lo10-1995.l1t4.html'
					]
				],
				[
					'id' => uuid_create(),
					'title' => 'Instrucción 1/2022, de 19 de enero, 
											de la Fiscalía General del Estado, 
											sobre el uso de medios de contención 
											mecánicos o farmacológicos en unidades 
											psiquiátricas o de salud mental y 
											centros residenciales y/o sociosanitarios 
											de personas mayores y/o con discapacidad.',
					'description' => 'Se trata de una instrucción 
														exclusivamente para fiscales.<br>
														No obstante es conveniente saber 
														qué se nos va a solicitar',
					'button' => [
						'text' => 'Ir al enlace',
						'link' => 'https://www.boe.es/boe/dias/2022/02/11/pdfs/BOE-A-2022-2221.pdf'
					]
				],
				[
					'id' => uuid_create(),
					'title' => 'Secreto profesional. 
											Artículo 199 del código penal.',
					'description' => 'Además, lo relacionado en el 
														código de deontología médica.',
					'button' => [
						'text' => 'Ir al enlace',
						'link' => 'https://noticias.juridicas.com/base_datos/Penal/lo10-1995.l2t10.html'
					]
				],
				[
					'id' => uuid_create(),
					'title' => 'Responsabilidad del MIR',
					'description' => '',
					'button' => [
						'text' => 'Ir al enlace',
						'link' => 'https://www.aepap.org/sites/default/files/documento/archivos-adjuntos/responsabilidad_residentes_tutores_y_especialistas_2020.pdf'
					]
				],
				[
					'id' => uuid_create(),
					'title' => 'Ley 8/2021, de 2 de junio, 
											por la que se reforma la legislación 
											civil y procesal para el apoyo a las 
											personas con discapacidad en el 
											ejercicio de su capacidad jurídica.',
					'description' => 'Especial relevancia el artículo 
														segundo. Se elimina el concepto 
														de "incapacidad", siendo sustituido 
														por el de "apoyo".',
					'button' => [
						'text' => 'Ir al enlace',
						'link' => 'https://www.boe.es/buscar/pdf/2021/BOE-A-2021-9233-consolidado.pdf'
					]
				]
			]
		];


		return Inertia::render('Concepts', [
			'intro' => $intro,
			'lists' => $lists,
			'page_content' => $page_content,
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
