@extends('layout')

@section('title', 'Groups')

@section('css')
group.css
@endsection

@section('content')
    @parent

    <h1>Groups</h1>

    <hr>

    <div class="groups_content">

        <div class="group_search_create">
            <form action="" method="post">

                <label for="searchgroup"></label>
                <input type="text" id="searchgroup" name="searchgroup" placeholder="search groups">

                <button type="submit">
                    search
                </button>

            </form>

            <ul>
                @foreach($groups as $group)
                <li class="btn_group_layout"><a href="/group/1" class="btn-group">{{$group->teamName}}</a></li>
                @endforeach
            </ul>

            <hr>

            <div class="create-group form">

                <form action="" method="post">

                    <label for="groupname"></label>
                    <input type="text" id="groupname" name="groupname">

                    <button type="submit">
                        Create new group
                    </button>

                </form>
            </div>
        </div>

        <div class="group_inspect">

            <h1>IMnerDs</h1>

            <hr>

            <div class="create-group form">

                <form action="" method="post">

                    <label for="runname"></label>
                    <input type="text" id="runname" name="runname">

                    <button type="submit">
                        Create run
                    </button>

                </form>
            </div>
        </div>

    </div>
@endsection