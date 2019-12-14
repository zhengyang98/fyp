<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CropsMonitoringController extends Controller
{
    public function showMonitor(){
        return view('crops');
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
