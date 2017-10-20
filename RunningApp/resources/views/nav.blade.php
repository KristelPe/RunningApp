<nav>

    <div class="hamburger_icon">

    </div>
    <ul class="nav_menu_js">
        <li class="{{ (Request::is('/') ? 'current_page' : '') }}"><a href="/">Home</a></li>
        @if( $loggedIn)
        <li class="{{ (Request::is('profile*') ? 'current_page' : '') }}"><a href="/profile">Profile</a></li>
        <li class="{{ (Request::is('parkours*') ? 'current_page' : '') }}"><a href="/parkours">Parkour</a></li>
        @endif
        @if( $loggedIn)
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

    <h1 class="page_title">@yield('title')</h1>

    <hr class="bar">

</div>
