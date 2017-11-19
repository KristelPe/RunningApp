@extends('layout')

@section('title', 'Parcour')


@section('content')
    @parent
    <div class="parcour_content">

        <div id="map" style="width:370px;height:300px;"></div>
    </div>


    <script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=geometry&amp;sensor=false"></script>
    <script type="text/javascript" src="/js/map.js"></script>
@endsection