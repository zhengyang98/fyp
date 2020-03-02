@extends('layouts.app')
@section('content')
@if(count($active_crops)>0)
    <div class ="container">
        <h1 style="margin-bottom: 20px">Past Monitoring Record:</h1>
        <table class="table" id="crops-table">
            <thead align="center">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Crop</th>
                <th scope="col">Crops Planted</th>
                <th scope="col">End Time</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody align="center">
            @foreach ($active_crops as $active_crop)
                <tr id="crop" class="crop-row">
                    <td id="crops-id" scope="row"></td>
                    <td scope="row"><img style="width: 40px; height: 40px"
                                         src = "{{$crop_img = DB::table('crops')->select('img-url')->where('crop_name', $active_crop->crop_name)->value('img-url')}}">
                        {{$active_crop->crop_name}}</td>
                    <td scope="row">{{$active_crop->quantity}}</td>
                    <td scope="row">{{$active_crop->end_time}}</td>
                    @if ($active_crop->status == "1")
                        <td id = "status" scope="row">Completed</td>
                    @endif
                    <td scope ="row"><a style="color: red" href='delete/{{$active_crop->id}}' class="btn-block">Delete</a>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$active_crops->links()}}
    </div>
@else
    <div class="container" style="font-size: 20px">No crop has been recorded as completed yet, please check your monitored crops <a href="{{route('crops.monitor')}}">here</a>.</div>
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
                td.innerHTML = i.toString();
            }
        }
        let y = setID("crops-table", 0)
    });
</script>
@endsection
