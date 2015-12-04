<nav class="navbar topnav-navbar navbar-fixed-top" role="navigation">
    <div class="navbar-header text-center">
        <button type="button" class="navbar-toggle" onClick="showMenu();">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="/"> CGPS </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">

        </ul>
        <ul class="nav navbar-nav pull-right navbar-right">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <span>{{ Lang::get(\Session::get('lang').'.lang') }}</span>
                </a>
                <ul class="dropdown-menu lang pull-right fadeIn">
                    <li><a href="#" onclick="changeLanguage('en')" class="lang">English</a></li>
                    <li><a href="#" onclick="changeLanguage('de')" class="lang">Dutch</a></li>
                    <li><a href="#" onclick="changeLanguage('ur')" class="lang">اردو</a></li>
                    <li><a href="#" onclick="changeLanguage('hn')" class="lang">हिन्दी</a></li>
                </ul>
            </li>

            <li class="dropdown admin-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <img src="images/flat-avatar.png" class="topnav-img" alt=""><span
                            class="hidden-sm">{{ ucfirst(Auth::user()->name) }}</span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('auth/logout') }}">{{ Lang::get(\Session::get('lang').'.logout') }}</a></li>
                </ul>
            </li>
        </ul>

    </div>
    <ul class="nav navbar-nav pull-right hidd">
        <li class="dropdown admin-dropdown" dropdown on-toggle="toggled(open)">
            <a href class="dropdown-toggle animated fadeIn" dropdown-toggle><img src="images/flat-avatar.png"
                                                                                 class="topnav-img" alt=""></a>
            <ul class="dropdown-menu pull-right">
                <li><a href="profile">profile</a></li>
                <li><a href="login">logout</a></li>
            </ul>
        </li>
    </ul>
</nav>