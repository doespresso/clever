@extends('layouts.scaffold')

@section('main')

<h1>Create Page</h1>

{{ Form::open(array('route' => 'pages.store')) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('alias', 'Alias:') }}
            {{ Form::text('alias') }}
        </li>

        <li>
            {{ Form::label('menu', 'Menu:') }}
            {{ Form::text('menu') }}
        </li>

        <li>
            {{ Form::label('meta-keyword', 'Meta-keyword:') }}
            {{ Form::text('meta-keyword') }}
        </li>

        <li>
            {{ Form::label('meta-description', 'Meta-description:') }}
            {{ Form::text('meta-description') }}
        </li>

        <li>
            {{ Form::label('text', 'Text:') }}
            {{ Form::textarea('text') }}
        </li>

        <li>
            {{ Form::label('icon', 'Icon:') }}
            {{ Form::text('icon') }}
        </li>

        <li>
            {{ Form::label('published', 'Published:') }}
            {{ Form::text('published') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


