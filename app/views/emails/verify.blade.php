<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify your e-mail</h2>

        <div>
            To verify your e-mail, click here: <a href="{{ URL::route('verify', array($token)) }}">{{ URL::route('verify', array($token)) }}</a>.
        </div>
    </body>
</html>
