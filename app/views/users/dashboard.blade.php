@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Dashboard</h1>
            @include('partials.messages')
            <ul>
                <li><a href="{{ URL::route('user_edit', array('key' => $data->user->url_key())) }}">Edit details</a></li>
                <li><a href="{{ URL::route('user_delete', array('key' => $data->user->url_key())) }}">Delete Account</a></li>
            </ul>

        </div><!--
    --></div>
@stop
