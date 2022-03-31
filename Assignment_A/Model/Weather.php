<?php
require("vendor/autoload.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Weather
 *
 * @author webre
 */

class Weather implements Weather_Interface {

    //put your code here
    private $url;

    public function __construct() {
       $this->url = __WEATHER_URL;
    }

    public function get_cities() {
        $str = file_get_contents(__CITIES_FILE);
        $json = json_decode($str, true);
        $cities = [];
        foreach ($json as $city) {
            if (strtolower($city['country']) === 'eg') {
            $cities[] = $city;
            }
        }
      return $cities;
    }

    public function get_weather($cityid) {
        try{
            $this->url = str_replace("{{cityid}}", $cityid, $this->url);
            $client = new \GuzzleHttp\Client();
            $response = $client->get($this->url);
            return json_decode($response->getBody(), true);
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // curl_setopt($ch, CURLOPT_URL, "http://api.openweathermap.org/data/2.5/weather?id=$cityid&lang=en&units=metric&APPID=" . __API_KEY ."&units=metric");
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // return curl_exec($ch);
        } catch(Exception $e){
            echo "Error message: " . $e->getMessage();
        }
    }

    public function get_current_time() {
        $date = date_create();
        $formatted_date = date_format($date, "l h:ia    jS F, Y");
        return $formatted_date;

        // return date('m/d/Y h:i:s a', time());

    }

}
