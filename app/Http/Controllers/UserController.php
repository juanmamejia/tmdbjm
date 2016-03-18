<?php

namespace App\Http\Controllers;

use Input;
use View;
use Response;

/**
   * User
   * 
   * 
   * @package    Controller
   * @author     Juan Manuel Mejía <juancho428@gmail.com>
*/
class UserController extends Controller 
{

	/**
	 * Manage adult option on queries via ajax..
	 *
	 * @return String.
	 */
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

	/**
	 * Set Cookie for including adult tiles on search
	 *
	 * @param string set True or False by user choice
	 * @return Void.
	 */
	private function setCookie($value)
	{
		$cookie_name = "adult";
		$cookie_value = $value;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	}
}