@extends('layouts.app')

@section('content')
<div class = "container">
    <form action = "POST">
        <select name ="crops">
            <option value = "Wheat"></option>
            <option value = "maize"></option>
        </select>
        <br/><br/>
        <input type="submit">
    </form>
</div>
@endsection

