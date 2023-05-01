<?php

namespace App\Http\Controllers\Static;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\GlobalContent;
use App\Models\Podcast;
use App\Models\Video;
use App\Models\Team;


class TeamController extends Controller
{
  
	public function index() {

		$intro = [
			'title' => 'Conoce a nuestro Comité científico y legal'
		];


		$list = [
			[
				'id' => uuid_create(),
				'image' => 'pic-1.webp',
				'name' => 'Dr Julio Guija',
				'position' => 'Departamento de Psiquiatría Forense 
											Instituto de Medicina Legal de Sevilla',
				'description' => 'Jefe del Servicio de Psiquiatría 
													Forense del Instituto de Medicina 
													Legal de Sevilla y Profesor asociado 
													del Departamento de Psiquiatría de 
													la Facultad de Medicina de la 
													Universidad de Sevilla.'
			],
			[
				'id' => uuid_create(),
				'image' => 'pic-2.webp',
				'name' => 'Dr. Lucas Giner',
				'position' => 'Servicio de Psiquiatría 
												Universidad de Sevilla',
				'description' => 'Licenciado en Medicina y Cirugía en 
													la Universidad de Sevilla y Doctor 
													por la Universidad Autónoma de Madrid. 
													Especializado en Psiquiatría por el 
													Hospital Universitario Puerta de Hierro 
													y en Psiquiatría Forense por la UNED. 
													Actualmente, Profesor Titular de la 
													Universidad de Sevilla.'
			],
			[
				'id' => uuid_create(),
				'image' => 'pic-3.webp',
				'name' => 'Mgda. María Núñez',
				'position' => 'Magistrada Juzgados de instrucción 
												nº 6 de Sevilla',
				'description' => 'Jefe del Servicio de Psiquiatría 
													Forense del Instituto de Medicina 
													Legal de Sevilla y Profesor asociado 
													del Departamento de Psiquiatría de 
													la Facultad de Medicina de la 
													Universidad de Sevilla.'
			]
		];


		return Inertia::render('Team', [
			'intro' => $intro,
			'list' => Team::all(),
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
