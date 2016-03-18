<?php 

namespace App\Http\Controllers;

use App\Discover;
use App\Person;
use Input;
use Response;

/**
   * Home
   * 
   * 
   * @package    Controller
   * @author     Juan Manuel Mejía <juancho428@gmail.com>
*/
class HomeController extends Controller {

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
	 * Show the application home to the user.
	 *
	 * @return Home View with Most popular movies, tv shows and persons.
	 */
	public function index()
	{
		$discoverObj = new Discover();
		$popularMoviesArray = $discoverObj->getPopularMovies();
		$popularTvShowsArray = $discoverObj->getPopularTvShows();

		$personObj = new Person();
		$popularPersonsArray = $personObj->getPopular();

		return view('home')->with('popularMovies', $popularMoviesArray['results'])->with('popularTvShows', $popularTvShowsArray['results'])->with('popularPersons', $popularPersonsArray['results']);
	}

}
