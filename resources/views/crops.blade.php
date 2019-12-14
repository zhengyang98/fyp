@extends('layouts.app')

@section('content')
<div class = "container">
<form method="POST">
        <select name ="crops">
            <option value = "Wheat">Wheat</option>
            <option value = "maize">Maize</option>
        </select>
        <br/><br/>
        <input type="submit">
    </form>
</div>
<script type="application/javascript">
    $('document').ready(function(){
       alert('hi');
    });
</script>
@endsection


