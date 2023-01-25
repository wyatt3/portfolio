<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('posts.index') }}" class="navbar-brand">My Favorite Cars</a></li>
                <li><a href="{{ route('posts.index') }}">Cars</a></li>
                <li><a href="{{ route('other.about') }}">About</a></li>
            </ul>
        </div>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                    <li><a href="{{ route('admin.index') }}">Admin</a></li>
                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @else
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    @endif
                </ul>
    </div>
</nav>