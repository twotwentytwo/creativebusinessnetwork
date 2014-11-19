@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Companies</h1>
            @include('partials.messages')
            <ul>
                @foreach($data->companies as $company)
                    <li class="list--unstyled">
                        @include('partials.company-summary', array('company' => $company, 'data' => $data))
                    </li>
                @endforeach
            </ul>
        </div><!--
    --></div>
@stop
