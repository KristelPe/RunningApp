@extends('layout')

@section('title', 'Parcour')


@section('content')
    @parent
    <div class="parcour_content">

    @foreach($activity as $a)

            <div class="parcour_segment_detail">

                <div id="map" class="detail_map"></div>
                <input id="poly" type="hidden" value="{{$a->map_polyline}}">
                <div class="detail_info">
                    <h1>{{$a->name}}</h1>
                    <p><b>Distance:</b> {{$a->distance}}m</p>
                    <p><b>Elevation:</b> <b>+ </b>{{$a->elev_high}}m, <b>- </b>{{$a->elev_low}}m</p>
                    <p><b>Runner:</b> {{$a->getUser->firstName}} {{$a->getUser->lastName}} </p>
                </div>
            </div>

        @endforeach

    </div>

    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAG9eNi9XWvuWL24MXNUEaQXIPOv6muLMk&amp;libraries=geometry&amp;sensor=false"></script>
    <script type="text/javascript" src="/js/map.js"></script>

@endsection