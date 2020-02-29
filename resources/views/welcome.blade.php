@extends('layouts.app')

@section('content')

@endsection

<script>
    $(document).ready(function(){
        function showLocation(position){
            var x = position.coords.latitude;
            var y = position.coords.longitude;
            alert("latitude: " + x + " longitude :" + y);
    }
    $("#ok").click(function () {
        navigator.geolocation.getCurrentPosition(showLocation);
});
});
 </script>


