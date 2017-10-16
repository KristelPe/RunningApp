@extends('layout')

@section('title', 'User')
@section('content')
    @parent

    <h1>{{ $userFirstName }}'s Profile</h1>
    <img src={{ $userAvatarO }}>
    <a href="/settings">Settings</a>

@endsection