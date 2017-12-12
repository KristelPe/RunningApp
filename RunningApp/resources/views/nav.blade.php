<nav>

    <div id="menuToggle">

        <input type="checkbox" />

        <span></span>
        <span></span>
        <span></span>


    <ul class="nav_menu_js">
        <a href="/"><img src="{{ asset('img/favicon.png') }}" class="nav_logo" alt="img"></a>
        <li class="nav_img_text"><a href="/" class="nav_item {{ (Request::is('/') ? 'current_page' : '') }}">Home</a></li>
        @if( Auth::check())
        <li><a href="/profile" class="nav_item {{ (Request::is('profile*') ? 'current_page' : '') }}">Profile</a></li>
        <li><a href="/parcours" class="nav_item {{ (Request::is('parcours') ? 'current_page' : '') }}">Parcours</a></li>
        <li><a href="/halloffame" class="nav_item {{ (Request::is('halloffame') ? 'current_page' : '') }}">Hall of Fame</a></li>
{{--
        <li class="{{ (Request::is('leaderboards') ? 'current_page' : '') }}"><a href="/leaderboard">Leaderboard</a></li>
--}}


            @if(Auth::User()->admin)
                <li><a href="/schedules" class="nav_item {{ (Request::is('/schedules') ? 'current_page' : '') }}">Schedules</a></li>
                <li><a href="/users" class="nav_item {{ (Request::is('/users') ? 'current_page' : '') }}">Users</a></li>
            @endif

            <li>
                <a href="/logout" class="login nav_item">
                    Log out
                </a>
            </li>

        @else
            <li>
                <a href="/login" class="login nav_item">
                    Log in
                </a>
            </li>
        @endif

        <a href="/settings"><img src="{{ asset('img/cogwheel.svg') }}" class="nav_logo" alt="img"></a>
        <li class="nav_img_text"><a href="/settings" class="nav_item {{ (Request::is('settings') ? 'current_page' : '') }}">Settings</a></li>
    </ul>

    </div>
</nav>

<div class="title_center">



    <br class="bar">

</div>
