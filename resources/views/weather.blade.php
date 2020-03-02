<style>
    tr td{
        font-size: 16px;
    }
</style>
@extends('layouts.app')
@section('content')
@if (count($forecast->forecast)>0)
<div class="links container">
    <h1>Weather Forecasts:</h1>
    <span style="font-size: 18px">Current Location: {{ $forecast->city }} - {{ $forecast->state }} - {{ $forecast->country }}</span>
    <br>
    <span style="font-size: 14px; margin-top: 20px">Latitude: {{ $forecast->latitude }}, Longitude: {{ $forecast->longitude }}</span>
    <br>
    @if (count($forecast->forecast))
        <table class="table" style="margin-top: 50px">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Weather</th>
                <th scope="col">Hour</th>
                <th scope="col">Temperature</th>
            </tr>
            </thead>
            <tbody>
            @foreach (array_slice($forecast->forecast,0,24) as $f)
                <tr>
                    <th scope="row">
                        <img width=40 src="{{ $f->iconLink . "?apiKey=e9NFIDxWiDMxC4pPOFXBIhW1cm7M05N2ZIGV2nSk1C4"}}">
                    </th>
                    <td>{{ $f->description }}</td>
                    <td>{{ Carbon\Carbon::createFromFormat("HmdY", $f->localTime) }}</td>
                    <td> {{ $f->temperature }}&deg;C</td>
                </tr>

            @endforeach
            </tbody>
        </table>
    @else
        <li>No forecast available.</li>
    @endif

</div>
    @else
        <div style="font-size: 24px">Weather information is unavailable for now, please come back later.</div>
    @endif
@endsection
