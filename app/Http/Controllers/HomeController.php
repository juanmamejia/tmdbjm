<?php 

namespace App\Http\Controllers;

use App\Discover;
use App\Person;
use Input;
use Response;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$discoverObj = new Discover();
		$popularMoviesArray = $discoverObj->getPopularMovies();
		$popularTvShowsArray = $discoverObj->getPopularTvShows();

		$personObj = new Person();
		$popularPersonsArray = $personObj->getPopular();

		//echo "<pre>"; print_r($popularPersonsArray); echo "</pre>";

		return view('home')->with('popularMovies', $popularMoviesArray['results'])->with('popularTvShows', $popularTvShowsArray['results'])->with('popularPersons', $popularPersonsArray['results']);
	}

}
