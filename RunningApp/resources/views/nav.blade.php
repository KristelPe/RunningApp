<nav>
    <ul>
        <li class="{{ (Request::is('/') ? 'active' : '') }}"><a href="/">Home</a></li>
        @if( $loggedIn)
        <li class="{{ (Request::is('profile*') ? 'active' : '') }}"><a href="/profile">Profile</a></li>
        <li class="{{ (Request::is('parkours*') ? 'active' : '') }}"><a href="/parkours">Parkour</a></li>
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
    @if( $loggedIn )
    <a href="/profile">
    <img src="{{ $userAvatarM }}" class="user_img">
        USER IMG
    </img>

    </a>
    @endif
</nav>


