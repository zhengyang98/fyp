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
{{--<script type="application/javascript">--}}
{{--    $('document').ready(function(){--}}
{{--       alert('hi');--}}
{{--    });--}}
{{--</script>--}}
@endsection


