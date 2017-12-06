@extends('layout')

@section('title', 'Parcours')
@section('css', 'parcours')

@section('content')
    @parent

    <div class="parcour_content">

        <div class="switch_button">
            <ul>
                <li class="switch_button_1" onclick="switchEffect(1)">Personal</li>
                <li class="switch_button_2" onclick="switchEffect(2)">Public</li>
            </ul>
        </div>

        <div class="personal_parcour switched_item_1">


            @foreach($parcours as $parcour)


                @if(Auth::user()->id == $parcour->athlete_id)

                    <div class="parcour_segment_layout">

                        <div class="parcour_segment">
                            <div id="map" class="parcour_img"></div>
                            <input id="poly" type="hidden" value="{{$parcour->map_polyline}}">

                            <div class="parcour_details">
                                    <a href="parcours/{{$parcour->id}}">
                                        <h2>{{$parcour->name}}</h2>
                                        <p>Distance: {{$parcour->distance / 1000}} KM</p>
                                        <p>Runner: {{$parcour->getUser->firstName}} {{$parcour->getUser->lastName}} </p>
                                    </a>
                                </div>
                        </div>

                        <hr class="bar">

                    </div>

                @endif

            @endforeach


        </div>

        <div class="public_parcour switched_item_2">

            @foreach($parcours as $parcour)


                @if(Auth::user()->id != $parcour->athlete_id)

                    <div class="parcour_segment_layout">

                        <div class="parcour_segment">
                            <div class="parcour_img">
                                <input class="poly" type="hidden" value="{{$parcour->map_polyline}}">
                            </div>
                            <div class="parcour_details">
                                <a href="parcours/{{$parcour->id}}">
                                    <h2>{{$parcour->name}}</h2>
                                    <p>Distance: {{$parcour->distance / 1000}} KM</p>
                                    <p>Runner: {{$parcour->getUser->firstName}} {{$parcour->getUser->lastName}} </p>
                                    <p>Advice: Perfect for you!</p>
                                </a>
                            </div>
                        </div>

                        <hr class="bar">

                    </div>

                @endif

            @endforeach

        </div>

    </div>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=geometry&amp;sensor=false"></script>
    <script>
        function initialize() {
            var poly = document.getElementsByClassName("poly").value;
            alert(poly);
            for (i = 0; i < poly.length; i++) {
                var decodedPath = google.maps.geometry.encoding.decodePath(poly);
                var decodedLevels = decodeLevels("BBBBBBBBBB");

                var bounds = new google.maps.LatLngBounds();
                var i;

                // The Bermuda Triangle
                for (i = 0; i < decodedPath.length; i++) {
                    var lat = decodedPath[i].lat();
                    var lng = decodedPath[i].lng();
                    var latlng = new google.maps.LatLng(lat, lng);
                    bounds.extend(latlng);
                }

                var center = bounds.getCenter();

                var myOptions = {
                    zoom: 13,
                    center: new google.maps.LatLng(center.lat(), center.lng()),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                var map = new google.maps.Map(document.getElementById("item2").previousSibling, myOptions);
                var setRegion = new google.maps.Polyline({
                    path: decodedPath,
                    levels: decodedLevels,
                    strokeColor: "#FF0000",
                    strokeOpacity: 1.0,
                    strokeWeight: 2,
                    map: map
                });
            }
        }

        function decodeLevels(encodedLevelsString) {
            var decodedLevels = [];

            for (var i = 0; i < encodedLevelsString.length; ++i) {
                var level = encodedLevelsString.charCodeAt(i) - 63;
                decodedLevels.push(level);
            }
            return decodedLevels;
        }
        initialize();
    </script>
    <script src="/js/switch_effect.js" type="text/javascript" charset="utf-8"></script>


@endsection