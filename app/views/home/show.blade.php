@extends('layouts.master')

@section('content')
@include('partials.messages')
    <div class="grid"><!--
    --><div class="g g-l-1-2 g-xl-1-3">
            <p>HOME PAGE</p>
            <p>Current time: {{ date('F j, Y, g:i A') }}  </p>
            <p>USERS IN DB:</p>
            <ul>
                @foreach($data->users as $user)
                    <li>{{ $user->url_key() }}: {{ $user->email }}</li>
                @endforeach
            </ul>
        </div><!--
        --><div class="g g-l-1-2 g-xl-2-3">
            <h2>Login/Register</h2>
            @include('partials.regin')
        </div><!--
    --></div>
@stop