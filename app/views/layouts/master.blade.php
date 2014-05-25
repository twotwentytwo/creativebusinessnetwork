<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/static/{{ Config::get('app.version') }}/css/global.css" />
        <title>CBN</title>
        <meta name="description" content="CBN" />
        <meta name="viewport" content="width=device-width" />
    </head>
    <body>
        <!--[if lt IE 9]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <div class="header">
            <div class="header_logo"><a href="{{ URL::route('home') }}">THINGSPACE</a></div>
            <div id="nav">
                <ul>
                    @if(Auth::check())
                        <li><a href="{{ URL::route('user_dashboard', array('key' => Auth::user()->url_key())) }}">Dashboard</a></li>
                        <li><a href="{{ URL::route('logout') }}">Log out ({{ Auth::user()->email }})</a></li>
                    @else
                        <li><a href="{{ URL::route('login') }}">Log in / Register</a></li>
                    @endif
                </ul>
            </div><!-- end nav -->
        </div>

        <div class="content">
            @yield('content')
        </div>

        <div class="footer">
            FOOTER
        </div>
    </body>
</html>
