@extends('layout')

@section('title', 'Groups')
@section('content')
    @parent

    <h1>Groups - Overzicht</h1>

    <ul>
        <li><a href="/group/1">Group 1</a></li>
    </ul>

    <div class="create-group form">

        <form action="" method="post">

            <label for="groupname"></label>
            <input type="text" id="groupname" name="groupname">

            <button type="submit">
                Create new group
            </button>

        </form>
    </div>
@endsection