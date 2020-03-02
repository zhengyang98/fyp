<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class WeatherController extends Controller
{
    public function index(){
        $minutes = 60;
        $forecast = \Illuminate\Support\Facades\Cache::remember('forecast', $minutes,  function () {
            Log::info("Not from cache");
            $app_api = "e9NFIDxWiDMxC4pPOFXBIhW1cm7M05N2ZIGV2nSk1C4";
            $lat = Auth::user()->lat;
            $long = Auth::user()->long;

            $url = "https://weather.ls.hereapi.com/weather/1.0/report.json?apiKey={$app_api}&product=forecast_hourly&latitude={$lat}&longitude={$long}";
            Log::info($url);
            $client = new \GuzzleHttp\Client();
            $res = $client->get($url);
            if ($res->getStatusCode() == 200) {
                $j = $res->getBody();
                $obj = json_decode($j);
                $forecast = $obj->hourlyForecasts->forecastLocation;
            }
            else{
                return Redirect::back();
            }
            return $forecast;
        });
       return view('weather', ["forecast" => $forecast]);
    }
}
