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

		return View::make('person/personView')->with('info', $personInfo)->with('credits', $personCredits)->with('images', $personImages);

	}

	

	
}