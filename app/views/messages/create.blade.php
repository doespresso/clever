@extends('layouts.scaffold')

@section('main')

<h1>Create Message</h1>

{{ Form::open(array('route' => 'messages.store')) }}
	<ul>
        <li>
            {{ Form::label('message', 'Message:') }}
            {{ Form::textarea('message') }}
        </li>

        <li>
            {{ Form::label('readed', 'Readed:') }}
            {{ Form::text('readed') }}
        </li>

        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
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


