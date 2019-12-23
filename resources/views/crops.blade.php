@extends('layouts.app')

@section('content')
<div class="container" xmlns="http://www.w3.org/1999/html">
<form method="POST" action="{{route('store.monitor')}}">
    @csrf
        <select name="crops_id" required>
            @foreach ($crops as $crop)
            <option value = {{$crop->id}}>Crop: {{$crop->crop_name}} Duration: {{$crop->duration/86400}} Days</option>
            @endforeach
        </select>
        <br/><br/>
        <input type="submit" value="Submit">
    </form>
</div>
<br/><br/>

@if(count($active_crops)>0)
    <div class ="container">
        <table class="table" id="crops-table">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Crops.</th>
                <th scope="col">Est. Time Remaining</th>
                <th scope="col">End Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($active_crops as $active_crop)
                <tr id="crop" class="crop-row">
                    <td scope="row">{{$active_crop->id}}</td>
                    <td scope="row">{{$active_crop->crop_name}}</td>
                    <td id="time" scope="row">loading...</td>
                    <td scope="row">{{$active_crop->end_time}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endif
<script type="application/javascript">
$("document").ready(function() {
//     var i = setInterval(function () {
//
//     }
//     },1000)
// });

    function getCol(id, col) {
        let t = document.getElementById(id);

        var n = t.rows.length;
        var i, s = null, tr, td;

        for (i = 1; i < n; i++) {
            tr = t.rows[i];
            td = tr.cells[col];
            var row = document.getElementById('crop');
            var cell = row.getElementsByTagName("td");
            tdd = tr.cells[3];
            let end = tdd.innerText;
            var end_date = new Date(end).getTime();
            var now = new Date().getTime();
            var distance = end_date - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            td.innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";
        }
    }

    var x = setInterval(function(){
        getCol("crops-table",2);
    },1000);
});

</script>
@endsection




