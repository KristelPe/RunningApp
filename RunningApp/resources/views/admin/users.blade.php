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


<h2>Admins</h2>
    <ul>

        @foreach($users as $u)
@if($u->admin)
            <br>

            <li>

                <div class="recent_activity">

                    <h3>{{$u->firstName}} {{ $u->lastName }}</h3>

                    <form action="/deleteuser" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="userToDelete" value="{{ $u->id }}">
                        <input type="submit" value="delete">
                    </form>
                    <form action="/removeadmin" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="userId" value="{{ $u->id }}">

                        <input type="submit" value="remove admin">
                    </form>



                </div>

            </li>
@endif
        @endforeach
    </ul>

    <h2>users</h2>
    <ul>

        @foreach($users as $u)
            @if(!$u->admin)

            <br>

            <li>

                <div class="recent_activity">

                    <h3>{{$u->firstName}} {{ $u->lastName }}</h3>

                    <form action="/deleteuser" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="userToDelete" value="{{ $u->id }}">
                        <input type="submit" value="delete">
                    </form>
                    <form action="/makeadmin" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="userId" value="{{ $u->id }}">
                        <input type="hidden" name="code" value="IAmRoot">
                        <input type="submit" value="make admin">
                    </form>



                </div>

            </li>
            @endif
        @endforeach
    </ul>






    <script src="js/switch_effect.js" type="text/javascript" charset="utf-8"></script>
@endsection