<?php

namespace App\Http\Controllers\Static;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class XeristarController extends Controller
{
  
	public function index() {

		$sections = [
			'resumen' => [
				'id' => uuid_create(),
				'text' => 'Resumen',
				'title' => '<strong>Resumen</strong>'
			],
			'adherencia' => [
				'id' => uuid_create(),
				'text' => 'Adherencia',
				'title' => '<strong>Adherencia</strong>'
			],
			'calidad-de-vida' => [
				'id' => uuid_create(),
				'text' => 'Calidad de vida',
				'title' => '<strong>Calidad de vida</strong>'
			],
			'tolerabilidad' => [
				'id' => uuid_create(),
				'text' => 'Tolerabilidad',
				'title' => '<strong>Tolerabilidad</strong>'
			],
			'indicaciones-dosificacion' => [
				'id' => uuid_create(),
				'text' => 'Indicaciones y dosificación',
				'title' => '<strong>Indicaciones y dosificación:</strong> 
										Mejoría integral hacia la recuperación funcional'
			],
			'posologia' => [
				'id' => uuid_create(),
				'text' => 'Posología',
				'title' => '<strong>Posología:</strong> Gracias al amplio 
										abanico de dosis ahora es más sencillo 
										individualizar el tratamiento'
			]
		];


		$breadcrumbs = [
			[
				'id' => uuid_create(),
				'text' => 'Tratamientos',
			],
			[
				'id' => uuid_create(),
				'text' => 'Depresión y Ansiedad'
			],
			[
				'id' => uuid_create(),
				'text' => 'XERISTAR®'
			]
		];


		$summary = [
			'title' => 'Frente a la depresión y la anisedad
									<strong>Xeristar&reg; expande su luz 
									con una gama más amplia.</strong>',
			'content' => 'A las dosis de 30 y 60 mg<br>se 
										suman las 
										<strong>NUEVAS PRESENTACIONES de 
										90 y 120 mg</strong>',
			'intro_image' => 'intro-product.webp',

			'cards' => [
				'title' => '<div>
											<span>Xeristar&reg; ofrece beneficios</span>
											para profesionales sanitarios y pacientes
										</div>',
				'blocks' => [
					[
						'id' => uuid_create(),
						'icon' => 'icon-hand-pharmacy.svg',
						'content' => '<strong>Mayor adherencia al 
													tratamiento</strong> en 
													comparación a dos tomas al día',
						'hash' => 'adherencia'
					],
					[
						'id' => uuid_create(),
						'icon' => 'icon-heart.svg',
						'content' => 'Mayor <strong>calidad de vida</strong> 
													para el paciente frente a placebo
													<sup>3</sup>',
						'hash' => 'calidad-de-vida'
					],
					[
						'id' => uuid_create(),
						'icon' => 'icon-protection.svg',
						'content' => 'Buena <strong>tolerabilidad</strong> 
													a dosis altas<sup>4,5</sup>',
						'hash' => 'tolerabilidad'
					],
					[
						'id' => uuid_create(),
						'icon' => 'icon-list.svg',
						'content' => '<strong>Recomendación</strong> 
													de las guías',
						'hash' => 'indicaciones-dosificacion'
					]
				]
			],

			'list' => [
				[
					'id' => uuid_create(),
					'title' => 'Eficacia en el tratamiento de la depresión y 
											sus síntomas ansiosos y físicos dolorosos desde 
											la primera semana<sup>16-19</sup>',
					'blocks' => null
				],
				[
					'id' => uuid_create(),
					'title' => 'Mejoría sintomática rápida<sup>16-18</sup>',
					'blocks' => [
						[
							'id' => uuid_create(),
							'icon' => 'icon-user-cloud.svg',
							'color' => 'white',
							'content' => 'Sintomas emocionales y ansiosos 
														<strong>desde la primera 
														semana</strong>'
						],
						[
							'id' => uuid_create(),
							'icon' => 'icon-user-pain.svg',
							'color' => 'pink',
							'content' => 'Síntomas somáticos dolorosos 
														<strong>a partir de la 
														segunda semana</strong>'
						]
					]
				],
				[
					'id' => uuid_create(),
					'title' => 'Mayores tasas de remisión que los ISRS 
											en pacientes con depresión moderada y 
											severa<sup>20</sup>',
					'blocks' => null
				]
			]
		];


		$adherence = [
			'icon1' => 'icon-check.svg',
			'title' => '<strong class="text-brand-blue">Cómoda posología:</strong> 
								<strong class="text-brand-pink">1</strong> 
								sola toma 
								<strong class="text-brand-blue">al día</strong>',
			'image' => 'products.webp',
			'content' => '<strong class="text-brand-pink">Una gama 
										más amplia:</strong><br>
										Las nuevas presentaciones de <strong>90 y 120 mg de 
										Xeristar&reg;</strong> permiten al paciente completar 
										su <strong>pauta diaria con una sola toma</strong>, 
										independientemente de la dosis requerida',
			'icon2' => 'icon-pharmacy.svg',
			'block' => [
				'title' => '<span class="text-brand-pink">Mayor 
										adherencia al tratamiento</span><br>
										En depresión 
										<span class="text-brand-pink">1</span> 
										toma frente a 
										<span class="text-brand-pink">2</span> 
										se asocia a 
										<span class="text-brand-pink">3</span> 
										veces mayor adherencia',
				'info' => '(OR 3,10, IC 95% 2,15-4,47; P < 0,001 para OD* versus > BID* dosificación).2'
			],
			'footer' => '<strong>OD: </strong>Una vez al día; <strong>BID: </strong>Dos veces al día.'

		];


		$life_quality = [
			'title' => 'Beneficios en la calidad de vida',
			'image' => 'life-quality.webp',
			'icon' => 'icon-heart.svg',
			'content' => 'El tratamiento con duloxetina a 
										dosis de 60-120 mg ha demostrado 
										frente a placebo <strong>mejorar</strong> 
										parámetros de la 
										<strong>calidad de vida</strong> 
										de los pacientes como el funcionamiento 
										global, el bienestar subjetivo o la 
										percepción de salud<sup>3</sup>'
		];


		$tolerability = [
			'title' => 'Buen perfil de seguridad, también en pacientes polimedicados',
			'list' => [
				[
					'id' => uuid_create(),
					'icon' => 'icon-hand-ok.svg',
					'color' => 'pink',
					'text' => '<strong class="text-brand-blue">Xeristar</strong> 
											a dosis altas (hasta 120 mg) y en 
											<strong>una sola toma</strong> al día 
											es <strong>bien tolerado</strong> a 
											largo plazo4'
				],
				[
					'id' => uuid_create(),
					'icon' => 'icon-hand-ok.svg',
					'color' => 'pink',
					'text' => '<strong class="text-brand-blue">Xeristar</strong> 
											a dosis altas también ha demostrado tener 
											<strong>buena tolerabilidad</strong> en 
											pacientes de edad avanzada<sup>5</sup>'
				],
				[
					'id' => uuid_create(),
					'icon' => 'icon-hand-ok.svg',
					'color' => 'pink',
					'text' => 'En pacientes polimedicados de edad 
											avanzada con depresión y dolor de 
											espalda crónico, 
											<strong class="text-brand-blue">Xeristar</strong> 
											a dosis de hasta 120mg ha demostrado 
											<strong>ser eficaz para tratar ambas 
											afecciones</strong>, además de aumentar 
											la adherencia al tratamiento<sup>6</sup>'
				],
				[
					'id' => uuid_create(),
					'icon' => 'icon-hand-ok.svg',
					'color' => 'blue',
					'text' => '<strong>Bien tolerado:</strong><br>
										<ul>
											<li>
												Tolerabilidad similar a la de los ISRS
												<sup>21</sup>
											</li>
											<li>
												Sin efectos significativos sobre el peso corporal
												<sup>22,23</sup>
											</li>
											<li>
												Sin aumento en la incidencia de hipertensión arterial
												<sup>23</sup>
											</li>
											<li>
												Bien tolerado en pacientes de edad avanzada a dosis altas
												<sup>5</sup>
											</li>
											<li>
												Bien tolerado a dosis altas de hasta 120mg en una toma al día
												<sup>4</sup>
											</li>
										</ul>'
				]
			],

			'banner' => [
				'title' => '¿Qué recomiendan las guías terapéuticas?',
				'icon' => 'icon-list.svg',
				'content' => '<strong>Xeristar&reg; es ahora recomendado 
											como <span class="text-brand-pink">1ª linea 
											de tratamiento</span></strong> en depresión 
											por las guías terapéuticas NICE y CANMAT
											<sup>7,8</sup>'
			]
		];

		
		$dosage = [
			'section1' => [
				'title' => '<span class="text-brand-blue">
											Indicaciones y pautas de dosificación 
											Xeristar&reg;<sup>1</sup>
										</span>',
				'list' => [
					[
						'id' => uuid_create(),
						'title' => 'TRATAMIENTO DE LOS EPISODIOS DEPRESIVOS MAYORES',
						'icon' => 'icon-user-depression.svg',
						'color' => 'blue',
						'content' => '<ul class="xeristar-list">
														<li>Dosis inicial y de mantenimiento:</li>
														<li>60 mg una vez al día</li>
														<li>Presentaciones disponibles de 90 o 120 mg</li>
													</ul>'
					],
					[
						'id' => uuid_create(),
						'title' => 'TRATAMIENTO DEL TRASTORNO DE ANSIEDAD GENERALIZADO',
						'icon' => 'icon-user-sad-cloud.svg',
						'color' => 'pink',
						'content' => '<ul class="xeristar-list">
														<li>Dosis inicial 30 mg una vez al día</li>
														<li>Incrementar a 60 mg al día (dosis habitual 
																de mantenimiento) si la respuesta es 
																insuficiente</li>
														<li>Aumentar hasta 90 o 120 mg al día si la 
																respuesta es insuficiente</li>
													</ul>
													<div class="bg-brand-blue text-white px-8 py-8 mt-6 rounded-2xl">
														En pacientes con trastorno depresivo mayor 
														y ansiedad, la dosis de inicio es de 60 mg 
														una vez al día
													</div>'
					],
					[
						'id' => uuid_create(),
						'title' => 'TRATAMIENTO DEL DOLOR NEUROPÁTICO 
												PERIFÉRICO DIABÉTICO EN ADULTOS<sup>9</sup>',
						'icon' => 'icon-user-pain-shoulder.svg',
						'color' => 'green',
						'content' => '<ul class="xeristar-list">
														<li>Dosis inicial y de mantenimiento: 
																60 mg una vez al día</li>
														<li>Incrementar (máximo 120 mg) si la 
																respuesta es insuficiente<sup>9</sup></li>
													</ul>'
					]
				]
			],

			'section2' => [
				'title' => 'Interacciones entre los síntomas emocionales 
										y físicos de la depresión',
				'intro' => '<strong>La serotonina y la noradrenalina</strong> 
										juegan un papel relevante en la modulación del 
										dolor y del estado de ánimo<sup>10-13</sup>',
				'image' => [
					'src' => 'xeristar-model.webp',
					'caption' => 'Modelo hipotético de neurocomportamiento 
												usando bases de datos de animales 
												principalmente'
				]
			],

			'banner' => [
				'icon' => 'user-cloud-depression.svg',
				'content' => 'Un desequilibrio entre la serotonina 
											y la noradrenalina puede producir 
											depresión, así como sintomatología
											dolorosa sin patología orgánica de 
											base<sup>14</sup>'
			]
		];


		$posology = [
			'cards' => [
				[
					'id' => uuid_create(),
					'icon' => 'icon-check.svg',
					'color' => 'blue',
					'title' => '<div>
												<span class="text-xeristar-blue">Cómoda posología:</span><br>
												<span class="text-xeristar-pink">1 sola toma al día<sup>1</sup></span>
											</div>'
				],
				[
					'id' => uuid_create(),
					'icon' => 'icon-hand-pharmacy.svg',
					'color' => 'pink',
					'title' => '<div>
												<span class="text-xeristar-blue">Mayor adherencia</span><br>
												<span class="text-xeristar-pink">en comparación con 2 tomas al día<sup>2</sup></span>
											</div>'
				]
			],

			'presentations' => [
				'intro' => 'A las dosis de 30 y 60 mg 
										<strong class="text-xeristar-pink">
										se unen las presentaciones de 90 y 120 
										mg de Xeristar&reg;</strong>, para ayudar a 
										tus 
										pacientes con depresión y ansiedad a seguir 
										el tratamiento de forma más cómoda y sencilla',
				'products' => [
					'new' => [
						[
							'id' => uuid_create(),
							'image' => 'xeristar90.webp',
							'title' => 'Xeristar 90 mg',
							'color' => 'green',
							'label' => '<strong>28</strong> caps'
						],
						[
							'id' => uuid_create(),
							'image' => 'xeristar120.webp',
							'title' => 'Xeristar 120 mg',
							'color' => 'yellow',
							'label' => '<strong>28</strong> caps'
						]
					],
					'regular' => [
						[
							'id' => uuid_create(),
							'image' => 'xeristar30.webp',
							'title' => 'Xeristar 30 mg',
							'color' => 'blue',
							'label' => '<strong>28</strong> caps'
						],
						[
							'id' => uuid_create(),
							'image' => 'xeristar60.webp',
							'title' => 'Xeristar 60 mg',
							'color' => 'red',
							'label' => '<strong>28</strong> caps'
						],
						[
							'id' => uuid_create(),
							'image' => 'xeristar60-large.webp',
							'title' => 'Xeristar 60 mg',
							'color' => 'red',
							'label' => '<strong>56</strong> caps'
						]
					]
				]
			]
		];
		
		
		$references = [
			['Ficha técnica Xeristar 90 y 120mg;'],
			['Srivastava K, Arora A, Kataria A, Cappelleri JC, Sadosky A, Peterson AM. Impact of reducing dosing frequency on adherence to oral therapies: a literature review and meta-analysis. Patient Prefer Adherence. 2013 May 20;7:419-34;'],
			['Pollack MH, Endicott J, Liebowitz M, Russell J, Detke M, Spann M, Ball S, Swindle R. Examining quality of life in patients with generalized anxiety disorder: clinical relevance and response to duloxetine treatment. J Psychiatr Res. 2008 Oct;42(12):1042-9.'],
			['Wohlreich MM, Mallinckrodt CH, Prakash A, Watkin JG, Carter WP. Duloxetine for the treatment of major depressive disorder: safety and tolerability associated with dose escalation. Depress Anxiety. 2007;24(1):41-52;'],
			["Kerner N, D'Antonio K, Pelton GH, Salcedo E, Ferrar J, Roose SP, Devanand D. An open treatment trial of duloxetine in elderly patients with dysthymic disorder. SAGE Open Med. 2014 May 8;2:2050312114533536;"],
			['Karp JF, et al. Duloxetine and care management treatment of older adults with comorbid major depressive disorder and chronic low back pain: results of an open-label pilot study. Int J Geriatr Psychiatry. 2010 Jun;25(6):633-42;'],
			['Depression in adults: treatment and management. London: National Institute for Health and Care Excellence (NICE); 2022 Jun 29;'],
			['Kennedy SH, et al. Canadian Network for Mood and Anxiety Treatments (CANMAT) 2016 Clinical Guidelines for the Management of Adults with Major Depressive Disorder: Section 3. Pharmacological Treatments. Can J Psychiatry. 2016 Sep;61(9):540-60;'],
			['Ficha técnica Xeristar 30 y 60 mg;'],
			["Lucki I. The spectrum of behaviors in uenced by serotonin. Biol Psychiatry 1998; 44(3): 151-162;"],
			['Ressler KJ et al. Role of serotonergic and noradrenergic systems in the pathophysiology of depression and anxiety disorders. Depress Anxiety 2000; 12(1): 2-19;'],
			['Frazer A. Serotonergic and noradrenergic reuptake inhibitors: prediction of clinical effects from in vitro potencies. J Clin Psychiatry 2001; 62(12):16-23;'],
			['Jones SL. Descending noradrenegic in uences on pain. Prog Brain Res 1991; 88:381-94;'], 
			['Stahl SM. J Clin Psychiatry 2002; 63(5): 382-383.'],
			['Caballero L et al. Psichosomatics 2008; 49(6):520-9;'],
			['Brannan SK et al. Onset of action for duloxetine 60 mg once daily: double-blind, placebo-controlled studies. J Psychiatr Res. 2005; 39(2):161-72;'],
			['Hirschfeld RM, Mallinckrodt C, Lee TC, Detke MJ. Time course of depression-symptom improvement during treatment with duloxetine. Depress Anxiety. 2005; 21(4):170-7;'],
			['Detke MJ, Lu Y, Goldstein DJ, Hayes JR, Demitrack MA. Duloxetine, 60 mg once daily, for major depressive disorder: a randomized double-blind placebo-contrlled trial. J Clin Psychiatry. 2002; 63(4):308-15;'],
			['Nemeroff CB et al. Phychopharm Bulletin 2002; 36(4): 106-132;'],
			['Huang J, et al. Clinical outcomes of patients with major depressive disorder treated with either duloxetine, escitalopram,  uoxetine, paroxetine, or sertraline. Neuropsychiatr Dis Treat. 2018 Sep 26;14:2473-2484;'],
			['Nelson JC et. al. The safety and tolerability of duloxetine compared with paroxetine and placebo: a pooled analysis of 4 clinical trials. Prim Care Companion J Clin Psychiatry. 2006;8(4):212-9;'],
			['Mallinckrodt CH et al. Duloxetine: A New Treatment for the Emotional and Physical Symptoms of Depression. Prim Care Companion J Clin Psychiatry. 2003; 5(1):19-28;'],
			['Mancini M et al. Duloxetine in the management of elderly patients with major depresive disorder: an analysis of published data. Expert Opin Pharmacother 2009; 10(5): 847-860.']
		];



		return Inertia::render('Xeristar', [
			'sections' => $sections,
			'breadcrumbs' => $breadcrumbs,
			'summary' => $summary,
			'adherence' => $adherence,
			'life_quality' => $life_quality,
			'tolerability' => $tolerability,
			'dosage' => $dosage,
			'posology' => $posology,
			'references' => $references
		]);

	}

}
