{{ Form::open(array('route' => 'login')) }}
    <!-- if there are login errors, show them here -->
    <p>
        {{ Form::label('email', 'Email Address') }}
        {{ Form::email('email', Input::old('email'), array('placeholder' => 'john@example.com')) }}
        {{ $errors->first('email') }}
    </p>

    <p>
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password') }}
        {{ $errors->first('password') }}
    </p>

    <p>{{ Form::submit('Submit!') }}</p>
{{ Form::close() }}