<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
	use HasFactory;

	protected $fillable = [
		'title',
		'url',
		'month',
		'content',
		'active',
	];


	// use \Sushi\Sushi;

	// protected $rows = [
	// 	[
	// 		'month' => 'Mayo',
	// 		'title' => 'Suicidio',
	// 		'content' => 'Responsabilidades civiles o penales 
	// 									derivadas de la conducta suicida',
	// 		'active' => true,
	// 		'url' => 'https://soundcloud.com/javier-loise/elton-john-dua-lipa-cold-heart-pnau-javier-penna-extended-remixfree24bit48hz-master-final?utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing'
	// 	],
	// 	[
	// 		'month' => 'Junio',
	// 		'title' => 'Diagnóstico y tratamiento',
	// 		'content' => 'Responsabilidad profesional ante 
	// 									errores de diagnósticos o de 
	// 									tratamiento',
	// 		'active' => true,
	// 		'url' => 'https://soundcloud.com/dualipa/dua-lipa-blow-your-mind-mwah-nk-ok-x-blue-lab-beats-remix?utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing'
	// 	],
	// 	[
	// 		'month' => 'Julio',
	// 		'title' => 'Menores',
	// 		'content' => 'Problemática psiquiátricolegal de 
	// 									los menores de 18 años',
	// 		'active' => false,
	// 		'url' => 'https://soundcloud.com/jaydenoverdrive/one-kiss?utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing'
	// 	],
	// 	[
	// 		'month' => 'Septiembre',
	// 		'title' => 'Medidas coercitivas',
	// 		'content' => 'Problemas relacionados con 
	// 									sujeciones, tratamientos 
	// 									involuntarios, etc.',
	// 		'active' => false,
	// 		'url' => 'https://soundcloud.com/deeepin/dua-lipa-be-the-onedeepin-remix-1?utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing'
	// 	],
	// 	[
	// 		'month' => 'Octubre',
	// 		'title' => 'Residentes',
	// 		'content' => 'Responsabilidad y obligaciones 
	// 									del Médico residente',
	// 		'active' => false,
	// 		'url' => 'https://soundcloud.com/mongraall/dua-lipa-x-madonna-dont-start?utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing'
	// 	],
	// 	[
	// 		'month' => 'Noviembre',
	// 		'title' => 'Auxilio a la Administración de Justicia',
	// 		'content' => 'Citaciones como perito, como testigo, etc.',
	// 		'active' => false,
	// 		'url' => 'https://soundcloud.com/user-111304297/sped-up-nightcore-no-lie-dua-lipa-sean-paul-remix?utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing'
	// 	]
	// ];

}
