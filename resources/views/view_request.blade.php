<style>
    .card-item{
        margin-right: 50px;
        font-size: 22px;
        width: 50%;
    }
</style>

@extends('layouts.app')

@section('content')
@if(count($active_requests)>0)
    <div class="container">
        <h1 style="margin-bottom: 20px; font-family: 'Montserrat'; font-weight: 800; letter-spacing: 1px; font-size: 40px">Crop Requests:</h1>
    @foreach ($active_requests as $active_request)
        @if ($active_request->status == '0')
            <div class="card" style="margin-bottom: 30px">
                <h5 class="card-header" style="font-size: 24px">Merchant:
                    <span style="font-weight: bold; margin-right: 110px">{{DB::table('users')->select('name')->where('id', $active_request->merchant_id)->value('name')}}</span>
                    <span style="font-size: 20px;">Merchant Location: {{$active_request->location}}</span>
                    <span style="font-size: 16px;float: right">Request Posted at: {{date("Y-m-d H:i:s", strtotime($active_request->created_at))}}</span>
                </h5>
                <div class="card-body">
                    <h5 class="card-title" style="text-decoration: underline;font-weight: 800; font-size: 20px">Crop Request</h5>
                    <table style="width: 80%;">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td><img class="rounded-circle"style="width: 100px; height: 100px; border: 3px solid greenyellow;margin-right: 20px"
                                     src = "{{$crop_img = DB::table('crops')->select('img-url')->where('crop_name', $active_request->crop_name)->value('img-url')}}"></td>
                            <td class="card-item">Crop Requested: <span style="font-weight: bold">{{$active_request->crop_name}}</span></td>
                            <td class="card-item">Amount Requested: {{$active_request->amount}} Kg</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="card-item" style="margin-left: 120px">Price Offered: RM {{$active_request->price}}</td>
                            <td class="card-item">Merchant Email: <a href="mailto:{{DB::table('users')->select('email')->where('id', $active_request->merchant_id)->value('email')}}">
                                {{DB::table('users')->select('email')->where('id', $active_request->merchant_id)->value('email')}}
                            </a></td>
                        </tr>
                    </table>
                    <a href="accept/{{$active_request->id}}/{{\Illuminate\Support\Facades\Auth::id()}}" class="btn btn-success" style="font-size: 20px; float: right; margin-top: 15px">Accept Request</a>
                </div>
            </div>
        @endif
    @endforeach
        {{$active_requests->links()}}
    </div>
@else
    <div class="container" style="font-size: 24px">There is currently no active request posted by merchant, please check again later.</div>
@endif
@endsection
