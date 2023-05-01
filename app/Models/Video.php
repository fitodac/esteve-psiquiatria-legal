<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	use HasFactory;

	protected $fillable = [
		'title',
		'link',
		'youtube_id'
	];


	// use \Sushi\Sushi;

	// protected $rows = [
	// 	[
	// 		'title' => 'Responsabilidad del psiquiatra en caso de suicidio. Caso I',
	// 		'portrait' => '/img/home/video-01.webp',
	// 		'link' => 'https://www.youtube.com/watch?v=20fZtlBqYO0&ab_channel=NOKUB15HA'
	// 	],
	// 	[
	// 		'title' => 'Responsabilidad del psiquiatra en caso de suicidio. Caso II',
	// 		'portrait' => '/img/home/video-02.webp',
	// 		'link' => 'https://www.youtube.com/watch?v=TnGl01FkMMo&ab_channel=Illumination'
	// 	],
	// 	[
	// 		'title' => 'El paciente "obliga" a su ingreso',
	// 		'portrait' => '/img/home/video-03.webp',
	// 		'link' => 'https://www.youtube.com/watch?v=imSefM4GPpE&ab_channel=Illumination'
	// 	]
	// ];

}
