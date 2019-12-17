<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crops;
use Illuminate\Support\Facades\DB;

class CropsMonitoringController extends Controller
{
    public function showCrops(){
        $crop = Crops::all();
       // $day = Crops::
        //$day = DB::table('crops')->pluck('duration(s)')->firstWhere('crops_name', ) ;
       // $day = $day/86400;
       // dd($day);
        return view ('crops', array('crops'=> $crop));
    }
    public function storeMonitor(Request $request){
        //dd($request->all());
        return $request->all();
    }
    public function startMonitor(){
        $countDownDate =  Date("Jan 5, 2021").time();
        $now =  Date("l jS \of F Y h:i:s").time();
        // $distance = $countDownDate - $now;
        // $days = floor($distance / (1000 * 60 * 60 * 24));
        // $hours = floor(($distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        // $minutes = floor(($distance % (1000 * 60 * 60)) / (1000 * 60));
        // $seconds = floor(($distance % (1000 * 60)) / 1000);

        echo "hi";
    }
}
