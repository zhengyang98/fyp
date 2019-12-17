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
        <table class="table">
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
                <tr id="test">
                    <td scope="row">{{$active_crop->id}}</td>
                    <td scope="row">{{$active_crop->crop_name}}</td>
                    <td id="time" scope="row">{{$active_crop->duration}}</td>
                    <td scope="row">{{$active_crop->end_time}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <p id="test"></p>
@endif
<script type="application/javascript">
    // alert(new Date().getTime());
$("document").ready(function(){
    var i = setInterval(function () {
        var row = document.getElementById('test');
        var cell = row.getElementsByTagName("td");
        var duration = cell[2].innerText;
        var end = cell[3].innerText;
        var end_date = new Date(end).getTime();
        var now = new Date().getTime();
        var distance = end_date - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("time").innerHTML =  days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";
    },1000)
});
</script>
@endsection




