<?php

namespace App\Http\Controllers;
use View;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index() {
		return View::make('pages.home');
	}

}