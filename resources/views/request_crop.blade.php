<style>
    span.select2.select2-container.select2-container--default{
        width: 500px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        font-size: 18px;
    }
    label{
        font-size: 18px;
    }

</style>
@extends('layouts.merchant_layout')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <h1 style="margin-bottom: 20px; font-family: 'Montserrat'; font-weight: 800; letter-spacing: 1px; font-size: 40px">Request Crop</h1>
        <form style="width: 200px" method="POST" action="{{route('store.request')}}">
            @csrf
            <div style="width: 200px">
                <div style="margin-bottom: 20px">
                    <span style="font-size: 18px">Crops to Request: </span>
                    <select class = "js-example-basic-single"  name="crops_id" required>
                        @foreach ($crops as $crop)
                            <option  value = {{$crop->id}}>{{$crop->crop_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="margin-bottom: 20px">
                    <span style="font-size: 18px">Location: </span>
                    <select class = "js-example-basic-single"  name="merchant_location" required>
                            <option name = "merchant_location">Kuala Lumpur</option>
                            <option  name = "merchant_location">Selangor</option>
                            <option  name = "merchant_location">Johor</option>
                            <option  name = "merchant_location">Kedah</option>
                            <option  name = "merchant_location">Kelantan</option>
                            <option  name = "merchant_location">Melaka</option>
                            <option  name = "merchant_location">Negeri Sembilan</option>
                            <option  name = "merchant_location">Pahang</option>
                            <option  name = "merchant_location">Perak</option>
                            <option  name = "merchant_location">Perlis</option>
                            <option  name = "merchant_location">Penang</option>
                            <option  name = "merchant_location">Sabah</option>
                            <option  name = "merchant_location">Sarawak</option>
                            <option  name = "merchant_location">Terengganu</option>
                    </select>
                </div>
            </div>
            <label for="amount">Amount (Kg): </label>
            <input id="amount" style="margin-bottom: 20px" type="number" name="crop_amount" value="crop_amount" min="1" step="0.10" required>
            <label for="price">Price (RM): </label>
            <input id="price" style="margin-right: 20px" type="number" name="crop_price" min="1" step="0.05" required>
            <br/><br/>
            <input class="btn btn-success" style="font-size: 18px" type="submit" value="Submit">
        </form>
    </div>
    <br/><br/>

@if(count($active_requests)>0)
    <div class ="container">
        <h1 style="margin-bottom: 20px">Requests Published:</h1>
        <table class="table" id="request-table">
            <thead align="center">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Crop</th>
                <th scope="col">Amount (KG)</th>
                <th scope="col">Price (RM)</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody align="center">
            @foreach ($active_requests as $active_request)
                <tr id="crop" class="crop-row">
                    <td id="crops-id" scope="row"></td>
                    <td scope="row">{{$active_request->crop_name}}</td>
                    <td scope="row">{{$active_request->amount}} Kg</td>
                    <td scope="row">RM {{$active_request->price}}</td>
                    @if ($active_request->status == "0")
                        <td id = "status" scope="row">Pending...</td>
                    @elseif($active_request->status == "1")
                        <td id = "status" scope="row">Request Accepted by User: <span style="font-weight: bold; margin-right: 10px">{{DB::table('users')->select('name')->where('id', $active_request->farmer_id)->value('name')}}</span>
                            Email: <a href="mailto: {{DB::table('users')->select('email')->where('id', $active_request->farmer_id)->value('email')}}" >{{DB::table('users')->select('email')->where('id', $active_request->farmer_id)->value('email')}}</a></td>
                    @endif
                    <td scope ="row"><a style="color: red" href='delete/{{$active_request->id}}' class="btn-block">Delete</a>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$active_requests->links()}}
    </div>

@else
    <div class="container" style="font-size: 20px">No request has been created yet, please create one to begin.</div>
@endif

<script type="application/javascript">
    $("document").ready(function() {
        $('.js-example-basic-single').select2();


    function setID(id, col) {
        let t = document.getElementById(id);

        let n = t.rows.length;
        let i, s = null, tr, td;

        for (i = 1; i < n; i++) {
            tr = t.rows[i];
            td = tr.cells[col];
            let row = document.getElementById('crop');
            td.innerHTML = i.toString();
        }
    }
    let y = setID("request-table", 0)


//     function setStatus(id, col) {
//     let t = document.getElementById(id);
//
//     let n = t.rows.length;
//     let i, s = null, tr, td;
//
//     for (i = 1; i < n; i++) {
//         tr = t.rows[i];
//         td = tr.cells[col];
//         if (td.innerHTML == '0'){
//             td.innerHTML = "Pending";
//         }
//         else if(td.innerHTML == '1'){
//             td.innerHTML = "Completed"
//             }
//         }
//     }
//     let x = setStatus("request-table", 4);
//
});
</script>
@endsection




