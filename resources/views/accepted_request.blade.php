@extends('layouts.app')
@section('content')
    @if(count($active_requests)>0)
        <div class ="container">
            <h1 style="margin-bottom: 20px; font-family:'Montserrat'; font-weight: 800">Requests Accepted:</h1>
            <table class="table" id="request-table">
                <thead align="center">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Crop</th>
                    <th scope="col">Amount (KG)</th>
                    <th scope="col">Price (RM)</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody align="center">
                @foreach ($active_requests as $active_request)
                    <tr id="crop" class="crop-row">
                        <td id="crops-id" scope="row"></td>
                        <td scope="row">{{$active_request->crop_name}}</td>
                        <td scope="row">{{$active_request->amount}} KG</td>
                        <td scope="row">RM {{$active_request->price}}</td>
                        @if ($active_request->status == "0")
                            <td id = "status" scope="row">Pending...</td>
                        @elseif($active_request->status == "1")
                            <td id = "status" scope="row">Request From by Merchant: <span style="font-weight: bold; margin-right: 10px">{{DB::table('users')->select('name')->where('id', $active_request->merchant_id)->value('name')}}</span>
                                Email: <a href="mailto: {{DB::table('users')->select('email')->where('id', $active_request->merchant_id)->value('email')}}" >{{DB::table('users')->select('email')->where('id', $active_request->merchant_id)->value('email')}}</a></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$active_requests->links()}}
            <div style="width: 30%; border: 3px solid #D3D3D3"></div>
                <h3 style="margin-top: 20px">Projected Income: <span style="font-weight: bold">RM {{DB::table('merchant_request')->where('farmer_id', \Illuminate\Support\Facades\Auth::id())->sum('price')}}</span></h3>
        </div>
@else
    <div class="container" style="font-size: 24px">There is currently no request accepted, please <a href="{{route('review.request')}}">click here</a> to view requests posted.</div>
@endif

<script type="application/javascript">
    $("document").ready(function() {

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
    });
</script>
@endsection
