<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
   * Discover
   * 
   * 
   * @package    Model
   * @author     Juan Manuel Mejía <juancho428@gmail.com>
*/
class Discover extends Model {
    /**
     * URL used to connect with API.
     *
     * @var string
     */
    protected $url = "https://api.themoviedb.org/3/discover/";

    /**
     * Valid API Key.
     *
     * @var string
     */
    protected $apiKey = "1259bee0c1240e639a71a2139f4d7eb1";
    
    /**
     * Popular Movies API request.
     *
     * @return Array with Popular Movies.
     */
	public function getPopularMovies()
    {
    	$urlQuery=$this->url.'movie?sort_by=popularity.desc&api_key='.$this->apiKey;
        $string = $this->curl_get_contents($urlQuery);
		$result = json_decode($string, true);

		return $result;
    }

    /**
     * Popular TV Shows API request.
     *
     * @return Array with Popular TV Shows.
     */
    public function getPopularTvShows()
    {
    	$urlQuery=$this->url.'tv?sort_by=popularity.desc&api_key='.$this->apiKey;
        $string = $this->curl_get_contents($urlQuery);
		$result = json_decode($string, true);

		return $result;
    }

    /**
	 * Get TMDN JSON via curl
	 *
	 * @param string $url  TMDN API URL
	 * @return TMDb JSON Content
	 */
	 private function curl_get_contents($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);

		return $output;
	}

}