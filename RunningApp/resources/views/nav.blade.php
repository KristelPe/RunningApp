<nav>
    <ul>
        <li class="{{ (Request::is('/') ? 'active' : '') }}"><a href="/">Home</a></li>
        <li class="{{ (Request::is('profile*') ? 'active' : '') }}"><a href="/profile">Profile</a></li>
        <li class="{{ (Request::is('parkours*') ? 'active' : '') }}"><a href="/parkours">Parkour</a></li>
        <li class="{{ (Request::is('groups*') ? 'active' : '') }}"><a href="/groups">Groups</a></li>
        <li>
            <a href="/login" class="login">
                Log in
            </a>
        </li>
    </ul>
    <a href="/profile">
    <div class="user_img">
        USER IMG
    </div>
    </a>
</nav>


