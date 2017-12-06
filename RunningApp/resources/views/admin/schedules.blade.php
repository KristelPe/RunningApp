@extends('layout')

@section('title', 'User')
@section('css', 'profile.css')

@section('content')
    @parent

    <form action="/addschedule" method="post">
        {{ csrf_field() }}
        <label for="name">Training schedule name</label>
        <input name="name" type="text">
        <label for="distGoal">I want to run this distance (in KM)</label>
        <input name="distGoal" type="number">
        <label for="dateGoal">By this date</label>
        <input name="dateGoal" type="date">
        <input type="submit">
    </form>



    <ul>

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






    <script src="js/switch_effect.js" type="text/javascript" charset="utf-8"></script>
@endsection