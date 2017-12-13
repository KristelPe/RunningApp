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


            @foreach($parcours as $index => $parcour)


                @if(Auth::user()->id == $parcour->athlete_id)

                    <div class="parcour_segment_layout">

                        <a href="parcours/{{$parcour->id}}">

                        <div class="parcour_segment">
                            <div id="{{$index}}" class="parcour_img"></div>
                            <input name="poly[]" type="hidden" value="{{$parcour->map_polyline}}">

                            <div class="parcour_details">
                                    <a href="parcours/{{$parcour->id}}">
                                        <h2>{{$parcour->name}}</h2>
                                        <p>Distance: {{$parcour->distance / 1000}} KM</p>
                                        <p>Runner: {{$parcour->getUser->firstName}} {{$parcour->getUser->lastName}} </p>
                                    </a>
                                </div>
                        </div>

                        </a>

                        <hr class="bar">

                    </div>


                @endif

            @endforeach


        </div>

        <div class="public_parcour switched_item_2">

            @foreach($parcours as $index => $parcour)


                @if(Auth::user()->id != $parcour->athlete_id)


                    <div class="parcour_segment_layout">

                        <a href="parcours/{{$parcour->id}}">

                        <div class="parcour_segment">
                            <div id="{{$index}}" class="parcour_img"></div>
                            <input name="poly[]" type="hidden" value="{{$parcour->map_polyline}}">

                            <div class="parcour_details">
                                <a href="parcours/{{$parcour->id}}">
                                    <h2>{{$parcour->name}}</h2>
                                    <p>Distance: {{$parcour->distance / 1000}} KM</p>
                                    <p>Runner: {{$parcour->getUser->firstName}} {{$parcour->getUser->lastName}} </p>
                                </a>
                            </div>
                        </div>

                        </a>

                        <hr class="bar">

                    </div>


                @endif

            @endforeach

        </div>

    </div>

    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAG9eNi9XWvuWL24MXNUEaQXIPOv6muLMk&amp;libraries=geometry&amp;sensor=false"></script>
    <script src="/js/mapAll.js"></script>
    <script src="/js/switch_effect.js" type="text/javascript" charset="utf-8"></script>


@endsection