@extends('layouts.master')

@section('content')
    <div class="grid"><!--
    --><div class="g">
            <h1>Edit company: <a href="{{ URL::route('companies_show', array(
                  'key' => $data->company->url_entity()
              )) }}">{{ $data->company->name }}</a></h1>
            @include('partials.messages')
            {{ Form::open(array('route' => array('companies_edit', $data->company->url_word))) }}
                <p>
                    {{ Form::label('name', 'Company name') }}
                    {{ Form::text('name', (Input::old('name')) ?: $data->company->name) }}
                    {{ $errors->first('name') }}
                </p>

                <p>
                    {{ Form::label('url_word', 'URL name') }}
                    {{ Form::text('url_word',(Input::old('url_word')) ?: $data->company->url_word) }}
                    {{ $errors->first('url_word') }}
                </p>

                <p>
                    {{ Form::label('image', 'Logo') }}
                    {{ Form::text('image',(Input::old('image')) ?: $data->company->imagev) }}
                    {{ $errors->first('image') }}
                </p>

                <p>
                    {{ Form::label('location', 'Location') }}
                    {{ Form::text('location',(Input::old('location')) ?: $data->company->location) }}
                    {{ $errors->first('location') }}
                </p>

                <p>
                    {{ Form::label('short_description', 'Short Description') }}
                    {{ Form::text('short_description',(Input::old('short_description')) ?: $data->company->short_description) }}
                    {{ $errors->first('short_description') }}
                </p>

                <p>
                    {{ Form::label('long_description', 'Long Description/Bio') }}
                    {{ Form::textarea('long_description',(Input::old('long_description')) ?: $data->company->long_description) }}
                    {{ $errors->first('long_description') }}
                </p>

                <p>{{ Form::submit('Submit!') }}</p>
            {{ Form::close() }}
        </div><!--
    --></div>
@stop
