<?php

namespace App\Http\Controllers;

use App\Active_crops;
use App\Crops;
use App\MerchantRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MerchantController extends Controller
{

    public function _construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function merchantHome(){
        return view('merchantHome');
    }

    public function displayRequest(){
        $crops = Crops::all();
        $active_requests = MerchantRequest::where('merchant_id', '=', Auth::id())->paginate(10);
        return view ('request_crop', compact('crops','active_requests'));
    }

    public function displayAcceptedRequest(){
        $crops = Crops::all();
        $active_requests = MerchantRequest::where('farmer_id', '=', Auth::id())->paginate(10);
        return view ('accepted_request', compact('crops','active_requests'));
    }

    public function reviewRequest(){
        $crops = Crops::all();
        $active_requests = MerchantRequest::where('status', '=', '0')->paginate(5);
        return view ('view_request', compact('crops','active_requests'));
    }

    public function requestCrop(Request $request){
        $active_requests = MerchantRequest::where('merchant_id', '=', Auth::id())->paginate(10);
        $merchant_request = new MerchantRequest;
        $merchant_request->crop_name = DB::table('crops')->select('crop_name')->where('id', $request->crops_id)->value('crop_name');
        $merchant_request->price = $request->crop_price;
        $merchant_request->amount = $request->crop_amount;
        $merchant_request->location = $request->merchant_location;
        $merchant_request->status = '0';
        $merchant_request->merchant_id = Auth::id();
        $merchant_request->save();

        return Redirect::back()->with(compact('active_requests','merchant_request'));
    }

    public function deleteRequest($id){
        MerchantRequest::where('id', $id)->delete();
        return Redirect::back();
    }

    public function acceptRequest($id, $user_id){
        MerchantRequest::where('id', $id)
            ->update(['status'=>'1']);
        MerchantRequest::where('id', $id)
            ->update(['farmer_id'=>$user_id]);
        return Redirect::back();
    }

}
