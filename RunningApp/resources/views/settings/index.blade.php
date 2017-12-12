@extends('layout')

@section('title', 'User')
@section('css', 'settings.css')
@section('content')
    @parent

    <h1>Settings</h1>

    <form action="/makeadmin" method="post" class="admin_form">
        {{ csrf_field() }}
        <label for="code">
            Want to become an admin?
            <br>
            Enter the following form for validation
        </label>
        <input name="code" type="password" class="form_input">
        <input name="userId" type="hidden" value="{{Auth::user()->id}}">
        <input type="submit" class="button">
    </form>


@endsection