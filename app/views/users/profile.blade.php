@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            @include('partials.messages')
            <h2>Welcome "{{ Auth::user()->email }}" to the protected page!</h2>
            <p>Your user ID is: {{ Auth::user()->id }}</p>
            <p>Your user Key is: {{ Auth::user()->url_key() }}</p>
        </div><!--
    --></div>
@stop
