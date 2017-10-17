@extends('layout')

@section('title', 'Home')

@section('css')
home.css
@endsection

@section('content')
    @parent

    <h1>Running Time</h1>

    <hr>

    <div class="home_content">
        <h2>Nothing to do, Such a lazy nerd...</h2>
    </div>

    <div class="home_content">
        <h3>Next running session in</h3>
        <h2>71 days/ 23 hours/ 35min</h2>
        <h3>Coming up: ...</h3>
        <h3>Coming up: ...</h3>
        <h3>Coming up: ...</h3>
    </div>

    <div class="home_content">
        <div id="map" class="home_map"></div>
        <button class="btn">Finish</button>
    </div>

@endsection