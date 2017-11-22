@extends('layout')

@section('title', 'Parcour')


@section('content')
    @parent
    <div class="parcour_content">

    @foreach($activity as $a)
            <h1>{{$a->name}}</h1>
            <br>
            <div class="parcour_content_detail">
                <div id="map" style="width:370px;height:300px;"></div>
                <div class="detail_info">
                    <p><b>Distance:</b> {{$a->distance}}m</p>
                    <p><b>Elevation:</b> <b>+ </b>{{$a->elev_high}}m, <b>- </b>{{$a->elev_low}}m</p>
                </div>
                <input id="poly" type="hidden" value="{{$a->map_polyline}}">
            </div>
        @endforeach

    </div>


    <script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=geometry&amp;sensor=false"></script>
    <script type="text/javascript" src="/js/map.js"></script>
@endsection