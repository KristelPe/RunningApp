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
                            <img src="" alt="img missing" class="parcour_img">
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
                            <img src="" alt="img missing" class="parcour_img">
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

@endsection