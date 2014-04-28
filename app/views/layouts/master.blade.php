<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/static/{{ Config::get('app.static_version') }}/css/global.css" />
        <link href='http://fonts.googleapis.com/css?family=Advent+Pro:400,300' rel='stylesheet' type='text/css'>
        <title>CBN</title>
        <meta name="description" content="CBN" />
        <meta name="viewport" content="width=device-width" />
    </head>
    <body>
        <!--[if lt IE 9]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        <div class="header">
            HEADER
        </div>

        <div class="content">
            @yield('content')
        </div>

        <div class="footer">
            FOOTER
        </div>
    </body>
</html>