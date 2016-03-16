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

		return View::make('movie/movieView')->with('info', $movieInfo)->with('credits', $movieCredits)->with('images', $movieImages);

	}

	

	
}