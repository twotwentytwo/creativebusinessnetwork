@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Log in</h1>
            @include('partials.messages')
            <p>Enter your email address and password to log in.</p>
            @include('partials.regin')
        </div><!--
    --></div>
@stop