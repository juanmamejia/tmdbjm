<?php

namespace App\Http\Controllers;


use App\Movie;
use Input;
use View;
use Response;


class MovieController extends Controller 
{

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

	public function showAjaxImage($imagePath)
	{
		return '<img src="https://image.tmdb.org/t/p/w500/'.$imagePath.'"" >';
	}

	
}