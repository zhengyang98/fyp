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
        });
    </script>
@endsection




