<?php

namespace App\Http\Controllers;


use App\Tv;
use Input;
use View;
use Response;

/**
   * Tv
   * 
   * 
   * @package    Controller
   * @author     Juan Manuel Mejía <juancho428@gmail.com>
*/
class TvController extends Controller 
{

	/**
	 * Show Tv info page.
	 *
	 * @param string $tvId  TMDB Tv id
	 * @return View with all info about the tv show.
	 */
	public function showTv($tvId)
	{
		$tvObj = new Tv();

		$tvInfo = $tvObj->getInfo($tvId);
		$tvCredits = $tvObj->getCredits($tvId);
		$tvImages = $tvObj->getImages($tvId);

		$tvPostersCount = count($tvImages['posters']);
		$tvBackdropsCount = count($tvImages['backdrops']);


		$tvCastCount = count($tvCredits['cast']);
		if ($tvCastCount>6)
		{
			$castPreviewCount = 6;
		}
		else
		{
			$castPreviewCount = $tvCastCount;
		}

		$tvCrewCount = count($tvCredits['crew']);
		if ($tvCrewCount>6)
		{
			$crewPreviewCount = 6;
		}
		else
		{
			$crewPreviewCount = $tvCrewCount;
		}

		return View::make('tv/tvView')->with('info', $tvInfo)->with('credits', $tvCredits)->with('images', $tvImages)->with('countPosters', $tvPostersCount)->with('countBackdrops', $tvBackdropsCount)->with('castPreviewCount', $castPreviewCount)->with('crewPreviewCount', $crewPreviewCount);;

	}

	/**
	 * Return HTML for modal image via ajax.
	 *
	 * @param string $imagePath  Tv Show Image Path
	 * @return String.
	 */
	public function showAjaxImage($imagePath)
	{
		return '<img src="https://image.tmdb.org/t/p/w500/'.$imagePath.'"" >';
	}

	
}