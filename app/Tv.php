<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tv extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $url = "https://api.themoviedb.org/3/tv/";
    protected $apiKey = "1259bee0c1240e639a71a2139f4d7eb1";
    
	public function getInfo($id)
    {
    	$urlQuery=$this->url.$id.'?api_key='.$this->apiKey;
        $string = $this->curl_get_contents($urlQuery);
		$result = json_decode($string, true);

		return $result;
    }

    public function getCredits($id)
    {
    	$urlQuery=$this->url.$id.'/credits?api_key='.$this->apiKey;
        $string = $this->curl_get_contents($urlQuery);
		$result = json_decode($string, true);

		return $result;
    }

    public function getImages($id)
    {
    	$urlQuery=$this->url.$id.'/images?api_key='.$this->apiKey;
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