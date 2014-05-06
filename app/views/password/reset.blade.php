@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Reset your password?</h1>
            @include('partials.messages')
            <form action="{{ action('RemindersController@postReset')}}">
                <input type="hidden" name="token" vale="{{ $token }}" />
                <input type="email" name="email" />
                <input type="password" name="password" />
                <input type="password" name="password_confirm" />
                <input type="submit" value="Reset Password" />
            </form>
        </div><!--
    --></div>
@stop