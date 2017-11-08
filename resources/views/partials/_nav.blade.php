<!-- default bootstrap navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
     <img class="logo" src="http://www.bolton-associates.co.uk/wp-content/uploads/2015/10/analytics-programming.png">
    <a class="navbar-brand" class="blog_title" href="/">IT Science Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mr">
            <li class="{{ Request::is('main') ?"active" :"" }}">
                <a class="nav-link" href="/main">Home</a>
            </li> 
             <li class="{{ Request::is('articles') ?"active" :"" }}">
                <a class="nav-link" href="/articles">Articles</a>
            </li> 
            @guest
            <li class="{{ Request::is('login') ?"active" :"" }}">
                <a class="nav-link" href="/login">Login</a>
            </li> 
            <li class="{{ Request::is('register') ?"active" :"" }}">
                <a class="nav-link" href="/register">Register</a>
            </li> 
            @else
            <li class="dropdown bl-light">
                <a href="#" class="nav-link" data-toggle="dropdown" role="button btn-md" aria-expanded="false" aria-haspopup="true">
                    {{ Auth::user()->username }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a class ="dropdown-item" class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            @endguest
            
            
    
        </ul><!-- navbar collapse -->
    </div><!-- container-fluid -->
</nav>