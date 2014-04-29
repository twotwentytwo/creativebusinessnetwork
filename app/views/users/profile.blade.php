@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <p>THIS IS A RESTRICTED PAGE. YOU MUST BE LOGGED IN TO VIEW IT</p>
            @section('content')
              <h2>Welcome "{{ Auth::user()->email }}" to the protected page!</h2>
              <p>Your user ID is: {{ Auth::user()->id }}</p>
              <p>Your user Key is: {{ Auth::user()->url_key() }}</p>
            @stop
        </div><!--
    --></div>
@stop