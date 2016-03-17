<?php

namespace App\Http\Controllers;


use App\Tv;
use Input;
use View;
use Response;


class TvController extends Controller 
{

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

		//echo "<pre>"; print_r($tvInfo); echo "</pre>";
		//echo "-------------------------------------------------------";
		//echo "<pre>"; print_r($tvCredits); echo "</pre>";
		//echo "-------------------------------------------------------";
		//echo "<pre>"; print_r($tvImages); echo "</pre>";
		return View::make('tv/tvView')->with('info', $tvInfo)->with('credits', $tvCredits)->with('images', $tvImages)->with('countPosters', $tvPostersCount)->with('countBackdrops', $tvBackdropsCount)->with('castPreviewCount', $castPreviewCount)->with('crewPreviewCount', $crewPreviewCount);;

	}

	

	
}