<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        font-size: 18px;
    }
</style>
@extends('layouts.app')

@section('content')
<div class="container" xmlns="http://www.w3.org/1999/html">
<form method="POST" action="{{route('store.monitor')}}">
    @csrf
        <span style="font-size: 18px">Crops to Monitor: </span><select class = "js-example-basic-single"  name="crops_id" required>
            @foreach ($crops as $crop)
            <option  value = {{$crop->id}}>{{$crop->crop_name}} (Duration: {{round($crop->duration/86400,1)}} Days)</option>
            @endforeach
        </select>
        <br/>
        <label style="font-size: 18px; margin-top: 20px" for="quantity">Seed Quantity (Gram): </label>
        <input style="margin-bottom: 20px; width: 200px;" type="number" name="crop_quantity" value="Quantity (Gram)" placeholder="Seed Quantity (Gram)" min="1" step="0.00" required>
        <br/><br/>
        <input class="btn btn-success" style="font-size: 18px" type="submit" value="Submit">
    </form>
</div>
<br/><br/>

@if(count($active_crops)>0)
    <div class ="container">
        <h1 style="margin-bottom: 20px">Active Crops Under Monitoring:</h1>
                <table class="table" id="crops-table">
                    <thead align="center">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Crops.</th>
                        <th scope="col">Seed Quantity</th>
                        <th scope="col">Est. Time Remaining</th>
                        <th scope="col">End Time</th>
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
                            <td scope="row">{{$active_crop->quantity}} g</td>
                            <td id="time" scope="row">Loading...</td>
                            <td scope="row">{{$active_crop->end_time}}</td>
                            <td scope ="row"><a style="display: inline; margin-right: 10px; color: red" href='delete/{{$active_crop->id}}' class="btn-block">Delete</a>
                                <a style="display: inline" href='update/{{$active_crop->id}}' class="btn-block">Mark As Completed</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$active_crops->links()}}
    </div>
@else
    <div class="container" style="font-size: 20px">No crop has been monitored yet, please select one to begin.</div>
@endif
<script type="application/javascript">

$("document").ready(function() {
    $('.js-example-basic-single').select2();
    function getCol(id, col) {
        let t = document.getElementById(id);

        let n = t.rows.length;
        let i, s = null, tr, td;

        for (i = 1; i < n; i++) {
            tr = t.rows[i];
            td = tr.cells[col];
            let row = document.getElementById('crop');
            //let cell = row.getElementsByTagName("td");
            let tdd = tr.cells[4];
            let end = tdd.innerText;
            let end_date = new Date(end).getTime();
            let now = new Date().getTime();
            let distance = end_date - now;
            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            td.innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";
            if (distance < 0){
                clearInterval(x);
                td.style.fontWeight = 'bold'
                td.style.color = 'green'
                td.innerHTML = "Completed"
            }
        }
    }

    let x = setInterval(function(){
        getCol("crops-table",3);
    },1000);

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

     $('crop-search').on('keyup', function(){
        let input, filter, x;
        input = document.getElementById("crop-search");
        filter = input.innerText.toUpperCase();
        let a = document.getElementById("dropdown");
        x = a.getElementsByTagName("option");
        for (i = 0; i < x.length; i++) {
            txtValue = x[i].textContent || x[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                x[i].style.display = "";
            } else {
                x[i].style.display = "none";
            }
        }
     });

    let y = setID("crops-table", 0)
});

</script>
@endsection




