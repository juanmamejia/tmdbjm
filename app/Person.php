<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
   * Person
   * 
   * 
   * @package    Model
   * @author     Juan Manuel Mejía <juancho428@gmail.com>
*/
class Person extends Model {
    /**
     * URL used to connect with API.
     *
     * @var string
     */
    protected $url = "https://api.themoviedb.org/3/person/";

    /**
     * Valid API Key.
     *
     * @var string
     */
    protected $apiKey = "1259bee0c1240e639a71a2139f4d7eb1";
    
    /**
     * Person Info API request.
     *
     * @param string $id  TMDB Person id
     * @return Array with Person info.
     */
	public function getInfo($id)
    {
    	$urlQuery=$this->url.$id.'?api_key='.$this->apiKey;
		$string = $this->curl_get_contents($urlQuery);
		$result = json_decode($string, true);

		return $result;
    }

    /**
     * Person Credits API request.
     *
     * @param string $id  TMDB Person id
     * @return Array with Person credits.
     */
    public function getCredits($id)
    {
    	$urlQuery=$this->url.$id.'/combined_credits?api_key='.$this->apiKey;
        $string = $this->curl_get_contents($urlQuery);
		$result = json_decode($string, true);

		return $result;
    }

    /**
     * Person Images API request.
     *
     * @param string $id  TMDB Person id
     * @return Array with Person images.
     */
    public function getImages($id)
    {
    	$urlQuery=$this->url.$id.'/images?api_key='.$this->apiKey;
        $string = $this->curl_get_contents($urlQuery);
		$result = json_decode($string, true);

		return $result;
    }

    /**
     * Popular Persons API request.
     *
     * @return Array with Popular Persons.
     */
    public function getPopular()
    {
    	$urlQuery=$this->url.'popular?api_key='.$this->apiKey;
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