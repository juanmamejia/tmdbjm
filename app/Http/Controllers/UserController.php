<?php

namespace App\Http\Controllers;

use Input;
use View;
use Response;


class UserController extends Controller 
{

	public function adultSetting()
	{
		if (Input::get('option'))
		{
			$option = Input::get('option');
			$option = htmlentities (trim($option) , ENT_NOQUOTES);
			if ($option == 'true' || $option == 'false')
			{
				$this->setCookie($option);
			}

			return  'Success';
		}
		else
		{
			return 'Error';
		}
	}

	private function setCookie($value)
	{
		$cookie_name = "adult";
		$cookie_value = $value;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	}
}