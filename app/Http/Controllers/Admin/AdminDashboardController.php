<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Podcast;
use App\Models\Video;

class AdminDashboardController extends Controller
{

	public function index()
	{
		return Inertia::render('Admin/Dashboard', [
			'podcasts' => Podcast::all()->count(),
			'videos' => Video::all()->count(),
		]);
	}


	/**
	 * PODCASTS
	 */
	public function podcasts()
	{
		return Inertia::render('Admin/Podcasts', [
			'podcasts' => Podcast::orderByDesc('created_at')->get()
		]);
	}


	public function createPodcasts()
	{
		return Inertia::render('Admin/PodcastCreateEdit');
	}


	public function editPodcasts($id)
	{
		$podcast = Podcast::find($id);

		return Inertia::render('Admin/PodcastCreateEdit', [
			'podcast' => $podcast ?? null
		]);
	}


	public function storePodcasts(Request $request)
	{
		$request->validate([
			'title' => 'required|string|max:255',
			'month' => 'required|string|max:255',
			'active' => 'boolean',
		]);

		Podcast::create($request->all());
		return redirect()->route('admin.podcasts')->with('success', 'El podcast se creó correctamente');
	}


	public function updatePodcasts(Request $request, $id)
	{
		$request->validate([
			'title' => 'required|string|max:255',
			'month' => 'required|string|max:255',
			'active' => 'boolean',
		]);

		$podcast = Podcast::find($id);
		$podcast->title = $request->title;
		$podcast->url = $request->url;
		$podcast->month = $request->month;
		$podcast->content = $request->content;
		$podcast->active = $request->active;

		$podcast->save();
		return redirect()->route('admin.podcasts')->with('success', 'Los cambios se guardaron con éxito');
	}


	public function destroyPodcasts(Request $request, $id)
	{
		$podcast = Podcast::find($id);
		$podcast->delete();
		return redirect()->route('admin.podcasts')->with('success', 'El podcast ha sido eliminado');
	}



	/**
	 * VIDEOS
	 */
	public function videos()
	{
		return Inertia::render('Admin/Videos', [
			'videos' => Video::orderByDesc('created_at')->get()
		]);
	}


	public function createVideos()
	{
		return Inertia::render('Admin/VideosCreateEdit');
	}


	public function editVideos($id)
	{
		return Inertia::render('Admin/VideosCreateEdit', [
			'video' => Video::find($id) ?? null
		]);
	}


	public function storeVideos(Request $request)
	{
		$request->validate([
			'title' => 'required|string|max:255',
			'link' => 'required|string|max:255'
		]);

		Video::create($request->all());
		return redirect()->route('admin.videos')->with('success', 'El video se creó correctamente');
	}


	public function updateVideos(Request $request, $id)
	{
		$request->validate([
			'title' => 'required|string|max:255',
			'link' => 'required|string|max:255'
		]);

		$video = Video::find($id);
		$video->title = $request->title;
		$video->link = $request->link;
		$video->youtube_id = $request->youtube_id;

		$video->save();
		return redirect()->route('admin.videos')->with('success', 'Los cambios se guardaron con éxito');
	}


	public function destroyVideos(Request $request, $id)
	{
		$video = Video::find($id);
		$video->delete();
		return redirect()->route('admin.videos')->with('success', 'El video ha sido eliminado');
	}

}
