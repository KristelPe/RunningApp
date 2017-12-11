@extends('layout')

@section('title', 'User')
@section('css', 'profile.css')

@section('content')
    @parent
    <div class="container__schedule">
        <form class="form__schedule" action="/addschedule" method="post">
            {{ csrf_field() }}
            <div class="container__schedule_item">
                <h2>New</h2>
                <label for="name">Schedule name: </label>
                <input name="name" type="text">
            </div>
            <div class="container__schedule_item">
                <label for="distGoal">Distance (in km): </label>
                <input name="distGoal" type="number">
            </div>
            <div class="container__schedule_item">
                <label for="dateGoal">End date: </label>
                <input name="dateGoal" type="date">
            </div>
            <input type="submit">
        </form>



        <ul class="list_schedule">

            @foreach($schedules as $s)

                <br>

                    <li>

                        <div class="recent_activity">

                            <h3>{{ $s->name }}</h3>



                            <p>Distance: {{ $s->endGoal }} KM</p>

                            <p>Target date: {{ $s->endDate }} </p>
                            <form action="/deleteschedule" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="scheduleToDelete" value="{{ $s->id }}">
                                <input type="submit" value="delete">
                            </form>



                        </div>

                    </li>

            @endforeach
        </ul>
    </div>






    <script src="js/switch_effect.js" type="text/javascript" charset="utf-8"></script>
@endsection