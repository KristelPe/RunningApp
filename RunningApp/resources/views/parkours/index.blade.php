@extends('layout')

@section('title', 'Parkours')
@section('css', 'parkours.css')

@section('content')
    @parent




    <div class="parkour_container">
        <h1>PARKOURS</h1>
        <hr class="bar">

        <ul class="parkours">


{{--
            @foreach
--}}

                <li class="parkour_name">
                    <a href="/parkour/1">   <h2>Vrijbroekpark Mechelen</h2> <p>5,5 km</p>    </a>
                </li>

                <li>

                    <div class="parkour_counts">

                            <p class="parkour_text">20 people recommend this route</p>

                        <p class="parkour_text">71 people ran this route</p>

                        <div class="parkour_image">

                        </div>
                    </div>

                </li>

            {{--Recommend this to other runners--}}
                <li>

                    <div class="btns">

                    <button type="submit" class="btn recommend">

                        Recommend

                    </button>
            {{--Plan group run -> Announce you are going to run this route to your group members--}}

                    <button type="submit" class="btn plan">

                        Plan group run

                    </button>

                    </div>

                </li>

                <li>

                    <img src="../images/star" alt="star" class="star">

                </li>



            {{--@endforeach--}}

        </ul>

        <hr class="bar split">

    </div>

@endsection