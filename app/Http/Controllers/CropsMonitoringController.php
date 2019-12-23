<?php

namespace App\Http\Controllers;

use App\Active_crops;
use Illuminate\Http\Request;
use App\Crops;
use Illuminate\Support\Facades\DB;

class CropsMonitoringController extends Controller
{
    public function showCrops(){
        $crops = Crops::all();
        $active_crops = Active_crops::all();
       // $day = Crops::
        //$day = DB::table('crops')->pluck('duration(s)')->firstWhere('crops_name', ) ;
       // $day = $day/86400;
       // dd($day);
        return view ('crops', compact('crops','active_crops'));
    }
    public function storeMonitor(Request $request){
        //dd($request->all());
        $crops = Crops::all();
        $active_crops = Active_crops::all();
        $active_crop = new Active_crops;
        $active_crop->crop_name = DB::table('crops')->select('crop_name')->where('id', $request->crops_id)->value('crop_name');
        $active_crop->duration = DB::table('crops')->select('duration')->where('id', $request->crops_id)->pluck('duration')->first();
        $active_crop->end_time = date("Y-m-d H:i:s", time()+$active_crop->duration);
        $active_crop->save();
        //dd($active_crop->end_time);
        $duration = (time()+$active_crop->duration) - strtotime($active_crop->created_at);
        return view ('crops', compact('crops','active_crops'));
    }
    public function startMonitor(){
        $countDownDate =  Date("Jan 5, 2021").time();
        $now =  Date("l jS \of F Y h:i:s").time();
        // $distance = $countDownDate - $now;
        echo "hi";
    }
}
