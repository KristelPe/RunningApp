<nav>

    <div class="hamburger_icon">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
    <ul class="nav_menu_js">
        <li class="{{ (Request::is('/') ? 'current_page' : '') }}"><a href="/">Home</a></li>
        @if( Auth::check())
        <li class="{{ (Request::is('profile*') ? 'current_page' : '') }}"><a href="/profile">Profile</a></li>
        <li class="{{ (Request::is('parcours') ? 'current_page' : '') }}"><a href="/parcours">Parcours</a></li>
        <li class="{{ (Request::is('leaderboards') ? 'current_page' : '') }}"><a href="/leaderboard">Leaderboard</a></li>

            <li>
                <a href="/logout" class="login">
                    Log out
                </a>
            </li>
        @else
            <li>
                <a href="/login" class="login">
                    Log in
                </a>
            </li>
        @endif
    </ul>
</nav>

<div class="title_center">



    <br class="bar">

</div>
