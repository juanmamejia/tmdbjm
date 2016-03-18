<?php

namespace App\Http\Controllers;


use App\Movie;
use Input;
use View;
use Response;

/**
   * Movie
   * 
   * 
   * @package    Controller
   * @author     Juan Manuel Mejía <juancho428@gmail.com>
*/
class MovieController extends Controller 
{

	/**
	 * Show Movie info page.
	 *
	 * @param string $movieId  TMDB Movie id
	 * @return View with all info about the movie.
	 */
	public function showMovie($movieId)
	{
		$movieObj = new Movie();

		$movieInfo = $movieObj->getInfo($movieId);
		$movieCredits = $movieObj->getCredits($movieId);
		$movieImages = $movieObj->getImages($movieId);

		$moviePostersCount = count($movieImages['posters']);
		$movieBackdropsCount = count($movieImages['backdrops']);


		$movieCastCount = count($movieCredits['cast']);
		if ($movieCastCount>6)
		{
			$castPreviewCount = 6;
		}
		else
		{
			$castPreviewCount = $movieCastCount;
		}

		$movieCrewCount = count($movieCredits['crew']);
		if ($movieCrewCount>6)
		{
			$crewPreviewCount = 6;
		}
		else
		{
			$crewPreviewCount = $movieCrewCount;
		}

		return View::make('movie/movieView')->with('info', $movieInfo)->with('credits', $movieCredits)->with('images', $movieImages)->with('countPosters', $moviePostersCount)->with('countBackdrops', $movieBackdropsCount)->with('castPreviewCount', $castPreviewCount)->with('crewPreviewCount', $crewPreviewCount);;

	}

	/**
	 * Return HTML for modal image via ajax.
	 *
	 * @param string $imagePath  Movie Image Path
	 * @return String.
	 */
	public function showAjaxImage($imagePath)
	{
		return '<img src="https://image.tmdb.org/t/p/w500/'.$imagePath.'"" >';
	}

	
}