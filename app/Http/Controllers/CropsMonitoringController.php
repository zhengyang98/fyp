<?php

namespace App\Http\Controllers;

use App\Active_crops;
use App\Mail\CropHarvest;
use App\User;
use Illuminate\Http\Request;
use App\Crops;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class CropsMonitoringController extends Controller
{
    public function showCrops(){
        $crops = Crops::all();
        $active_crops = Active_crops::where('farmer_id', '=', Auth::id())
            ->where('status', '=', '0')->paginate(10);
        foreach ($active_crops as $active_crop){
            $crop_img = DB::table('crops')->select('img-url')->where('crop_name', $active_crop->crop_name)->value('img-url');
        }
        return view ('crops', compact('crops','active_crops','crop_img'));
    }
    public function storeMonitor(Request $request){
        //dd($request->all());
        $crops = Crops::all();

        $active_crops = Active_crops::where('farmer_id', '=', Auth::id())
            ->where('status', '=', '0')->paginate(10);
        $active_crop = new Active_crops;
        $active_crop->crop_name = DB::table('crops')->select('crop_name')->where('id', $request->crops_id)->value('crop_name');
        $active_crop->duration = DB::table('crops')->select('duration')->where('id', $request->crops_id)->pluck('duration')->first();
        $active_crop->quantity = $request->crop_quantity;
        $active_crop->end_time = date("Y-m-d H:i:s", time()+$active_crop->duration);
        $active_crop->status = '0';
        $active_crop->farmer_id = Auth::id();
        $active_crop->save();
        $duration = (time()+$active_crop->duration) - strtotime($active_crop->created_at);
        return Redirect::back()->with('crops', compact('crops','active_crops','crops_img'));
    }
    public function startMonitor(){
        $countDownDate =  Date("Jan 5, 2021").time();
        $now =  Date("l jS \of F Y h:i:s").time();
        // $distance = $countDownDate - $now;
        echo "hi";
    }
    public function deleteMonitor($id){
        //dd($id);
        Active_crops::where('id', $id)->delete();
        return Redirect::back();
    }
    public function completeMonitor($id){
        Active_crops::where('id', $id)
            ->update(['status'=>'1']);
        return Redirect::back();
    }

    public function showRecord(){
        $crops = Crops::all();
        $active_crops = Active_crops::where('farmer_id', '=', Auth::id())
            ->where('status', '=', '1')->paginate(10);
        foreach ($active_crops as $active_crop){
            $crop_img = DB::table('crops')->select('img-url')->where('crop_name', $active_crop->crop_name)->value('img-url');
        }
        return view ('crop_record', compact('crops','active_crops','crop_img'));
    }

    public function getCoordinate(Request $request){
        $lat = strval($request->lat);
        $long = strval($request->long);
        //dd($long);
        $users = new User;
        User::where('id', Auth::id())
            ->update(['lat'=>$lat,
                'long'=>$long]);
    }

//    public function sendReminder(){
//        Mail::to('yang123pro@hotmail.com')->send(new CropHarvest());
//    }
}
