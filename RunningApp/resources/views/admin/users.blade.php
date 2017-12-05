@extends('layout')

@section('title', 'User')
@section('css', 'profile.css')

@section('content')
    @parent




<h2>Admins</h2>
    <ul>

        @foreach($users as $u)
@if($u->admin)
            <br>

            <li>

                <div class="recent_activity">
                    <img src="{{ $u->avatar }}" alt="">

                    <h3>{{$u->firstName}} {{ $u->lastName }}</h3>

                    @if($u->id != Auth::user()->id)
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
                    @endif



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
                    <img src="{{ $u->avatar }}" alt="">

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