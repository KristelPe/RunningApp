@extends('layout')

@section('title', 'User')
@section('content')
    @parent

    <h1>{{ $userFirstName }}'s Profile</h1>
    <img src={{ $userAvatarO }}>
    <a href="/settings">Settings</a>

    <h2> Activities </h2>

    <ul>
    @foreach($allActivity as $activity)
        <li>
            <h3>{{ $activity->name }}</h3>
            <p>Type: {{ $activity->type }}</p>
            <p>Distance: {{ $activity->distance }}m</p>
            <p>Duration: {{ $activity->moving_time }}</p>
            <p>Likes: {{ $activity->kudos_count }}</p>
            <p>Average speed: {{ $activity->average_speed }}</p>
            <p>Max speed: {{ $activity->max_speed }}</p>
        </li>
    @endforeach
    </ul>

@endsection