@extends('layouts.master')

@section('content')
@include('partials.messages')
    <div class="grid"><!--
    --><div class="g g-l-1-2 g-xl-2-3">
            <h1>Welcome to your business network</h1>
            <p>Develop new business by connecting through recommendations &amp; projects.</p>
            <p><a href="{{ URL::route('companies_list') }}">List of companies</a></p>
            
        </div><!--
        --><div class="g g-l-1-2 g-xl-1-3">
            @if(!Auth::check())
                <h2>Log in</h2>
                @include('partials.regin')
            @endif
        </div><!--
    --></div>
@stop
