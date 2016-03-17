<?php

namespace App\Http\Controllers;


use App\Search;
use Input;
use Response;


class SearchController extends Controller 
{

	public function showResults()
	{

		//$theResults = Search::getResults('Brad Pitt');
		$foo = new Search();
		$theResults = $foo->getResults('Brad');

		echo "<pre>"; print_r($theResults); echo "</pre>";

		//return View::make('payments/paypalView')->with('token', $clientToken);

	}

	public function showAutocomplete()
	{
		$term = strtolower(Input::get('term'));

		$searchObj = new Search();
		$theResults = $searchObj->getResults($term);
		$cantResults = count($theResults['results']);

		if (count($cantResults)>0)
		{
			$return_array = array();

			$i=0;

			if ($cantResults>6)
			{
				$cantToShow = 6;
			}
			else
			{
				$cantToShow = $cantResults;
			}

			for($i=0;$i<$cantToShow;$i++)
			{
				if ($theResults['results'][$i]['media_type'] == 'movie')
				{
					$label = $theResults['results'][$i]['title'];
					$icon = $theResults['results'][$i]['poster_path'];
					$extra = substr($theResults['results'][$i]['release_date'], 0, 4);
					$link = url('/movie').'/'.$theResults['results'][$i]['id'];
					$type = '(Movie)';
				}
				else if ($theResults['results'][$i]['media_type'] == 'person')
				{
					$label = $theResults['results'][$i]['name'];
					$icon = $theResults['results'][$i]['profile_path'];

					if (count($theResults['results'][$i]['known_for'])>0)
					{
						$knowCant = count($theResults['results'][$i]['known_for']);

						$extra='';

						for($k=0;$k<$knowCant;$k++)
						{
							$extra.=$theResults['results'][$i]['known_for'][$k]['original_title'];

							if ($k<($knowCant-1))
							{
								$extra.=', ';
							}
						}
					}
					else
					{
						$extra = '';
					}

					$link = url('/person').'/'.$theResults['results'][$i]['id'];
					$type = '(Person)';
				}
				else if ($theResults['results'][$i]['media_type'] == 'tv')
				{
					$label = $theResults['results'][$i]['name'];
					$icon = $theResults['results'][$i]['poster_path'];
					$extra = substr($theResults['results'][$i]['first_air_date'], 0, 4);
					$link = url('/tv').'/'.$theResults['results'][$i]['id'];
					$type = '(TV)';
				}

				if (empty($label))
				{
					$label = 'Not Info or Uncredited';
				}

				if (empty($icon))
				{
					$icon = 'https://assets.tmdb.org/assets/7f29bd8b3370c71dd379b0e8b570887c/images/no-poster-w185-v2.png';
				}
				else
				{
					$icon = 'https://image.tmdb.org/t/p/w45/'.$icon;
				}

				$return_array[$i]['label'] = $label;
				$return_array[$i]['icon'] = $icon;
				$return_array[$i]['extra'] = $extra;
				$return_array[$i]['link'] = $link;
				$return_array[$i]['type'] = $type;
			}

			return Response::json($return_array);
		}

	}
}