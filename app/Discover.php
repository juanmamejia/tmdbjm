<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Discover extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $url = "https://api.themoviedb.org/3/discover/";
    protected $apiKey = "1259bee0c1240e639a71a2139f4d7eb1";
    
	public function getPopularMovies()
    {
    	$urlQuery=$this->url.'movie?sort_by=popularity.desc&api_key='.$this->apiKey;
        $string = $this->curl_get_contents($urlQuery);
		$result = json_decode($string, true);

		return $result;
    }

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
	 * @param string $url			TMDN API URL
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