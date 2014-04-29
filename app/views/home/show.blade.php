@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g g-l-1-2 g-xl-1-3">
            HOME PAGE
        </div><!--
        --><div class="g g-l-1-2 g-xl-2-3">
            <p>USERS IN DB:</p>
            <ul>
                @foreach($data->users as $user)
                    <li>{{ $user->url_key() }}: {{ $user->email }}</li>
                @endforeach
            </ul>
        </div><!--
    --></div>
@stop