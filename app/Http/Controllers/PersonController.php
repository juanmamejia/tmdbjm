<?php

namespace App\Http\Controllers;


use App\Person;
use Input;
use View;
use Response;


class PersonController extends Controller 
{

	public function showPerson($personId)
	{
		$personObj = new Person();

		$personInfo = $personObj->getInfo($personId);
		$personCredits = $personObj->getCredits($personId);
		$personImages = $personObj->getImages($personId);

		$personCastCount = count($personCredits['cast']);
		if ($personCastCount>6)
		{
			$castPreviewCount = 6;
		}
		else
		{
			$castPreviewCount = $personCastCount;
		}

		$personCrewCount = count($personCredits['crew']);
		if ($personCrewCount>6)
		{
			$crewPreviewCount = 6;
		}
		else
		{
			$crewPreviewCount = $personCrewCount;
		}

		$personImagesCount = count($personImages['profiles']);

		//Temp cast array for in order to sort by date
		$creditsDateCastTempArray = array();

		for ($i=0;$i<count($personCredits['cast']);$i++)
		{
			$creditsDateCastTempArray[$i]['key'] = $i;

			if ($personCredits['cast'][$i]['media_type'] == 'movie')
			{
				$creditsDateCastTempArray[$i]['date'] = $personCredits['cast'][$i]['release_date'];
			}
			else
			{
				$creditsDateCastTempArray[$i]['date'] = $personCredits['cast'][$i]['first_air_date'];
			}
		}

		usort($creditsDateCastTempArray, array($this,'sortDate'));


		//Temp crew array for in order to sort by date
		$creditsDateCrewTempArray = array();

		for ($i=0;$i<count($personCredits['crew']);$i++)
		{
			$creditsDateCrewTempArray[$i]['key'] = $i;

			if ($personCredits['crew'][$i]['media_type'] == 'movie')
			{
				$creditsDateCrewTempArray[$i]['date'] = $personCredits['crew'][$i]['release_date'];
			}
			else
			{
				$creditsDateCrewTempArray[$i]['date'] = $personCredits['crew'][$i]['first_air_date'];
			}
		}

		usort($creditsDateCrewTempArray, array($this,'sortDate'));



		//echo "<pre>"; print_r($creditsDateCastTempArray); echo "</pre>";
		return View::make('person/personView')->with('info', $personInfo)->with('credits', $personCredits)->with('images', $personImages)->with('countImages', $personImagesCount)->with('sortCast', $creditsDateCastTempArray)->with('sortCrew', $creditsDateCrewTempArray)->with('castPreviewCount', $castPreviewCount)->with('crewPreviewCount', $crewPreviewCount);

	}

	private function sortDate($a, $b)
	{
	    if ($a['date'] == $b['date']) {
	        return 0;
	    }
	    return ($a['date'] > $b['date']) ? -1 : 1;
	}

	
}