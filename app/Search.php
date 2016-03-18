<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $url = "https://api.themoviedb.org/3/search/";
    protected $apiKey = "1259bee0c1240e639a71a2139f4d7eb1";
    
	public function getResults($queryStr,$adult='false')
    {
    	$urlQuery=$this->url.'multi?query='.urlencode($queryStr).'&api_key='.$this->apiKey.'&include_adult='.$adult;
        $string = $this->curl_get_contents($urlQuery);
		$result = json_decode($string, true);

		return $result;
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */

    
	public function getResultsWithPagination($queryStr, $page, $adult='false')
    {
    	$urlQuery=$this->url.'multi?query='.urlencode($queryStr).'&page='.$page.'&api_key='.$this->apiKey.'&include_adult='.$adult;
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