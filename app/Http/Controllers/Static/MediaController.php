<?php

namespace App\Http\Controllers\Static;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\GlobalContent;
use App\Models\Podcast;
use App\Models\Video;


class MediaController extends Controller
{
  
	public function index() {

		$title_podcasts = 'Escucha cada mes un nuevo podcast<br>
							con las situaciones más habituales en 
							psiquiatría legal';

		$title_videos = 'Accede a los vídeos de situaciones ya tratadas';


		return Inertia::render('Media', [
			'title_podcasts' => $title_podcasts,
			'podcasts' => Podcast::all(),
			'title_videos' => $title_videos,
			'videos' => [
				'items' => Video::all()
			],
			'banner_footer' => [
				'title' => GlobalContent::whereType('podcasts_banner_title')->first()->content,
				'btn_text' => GlobalContent::whereType('podcasts_banner_btn_text')->first()->content,
				'btn_link' => GlobalContent::whereType('podcasts_banner_btn_link')->first()->content,
			]
		]);
	}

}
