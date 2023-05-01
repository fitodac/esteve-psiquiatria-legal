<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalContent extends Model
{
	use HasFactory;
	use \Sushi\Sushi;

	protected $rows = [
		[
			'type' => 'podcast_title',
			'content' => 'Escucha los podcasts que te interesen, cuando quieras'
		],
		[
			'type' => 'podcasts_banner_title',
			'content' => '¿QUIERES PARTICIPAR EN LOS PODCASTS? 
										Haz una consulta.'
		],
		[
			'type' => 'podcasts_banner_btn_text',
			'content' => 'Hacer una consulta'
		],
		[
			'type' => 'podcasts_banner_btn_link',
			'content' => '#'
		]
	];

}
