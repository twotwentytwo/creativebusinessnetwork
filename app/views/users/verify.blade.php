@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Verify your e--mail address</h1>
            @include('partials.messages')
            <p>A verification e-mail was sent to {{ Auth::user()->email }}</p>
            {{ Form::open(array('route' => 'verify')) }}
                <p>{{ Form::submit('Resend') }} </p>
            {{ Form::close() }}
        </div><!--
    --></div>
@stop
