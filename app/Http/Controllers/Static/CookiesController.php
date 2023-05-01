<?php

namespace App\Http\Controllers\Static;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CookiesController extends Controller
{
  
	public function index() {
		return Inertia::render('Cookies', []);
	}

}
