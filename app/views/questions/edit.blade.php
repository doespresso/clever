@extends('layouts.scaffold')

@section('main')

<h1>Edit Question</h1>
{{ Form::model($question, array('method' => 'PATCH', 'route' => array('questions.update', $question->id))) }}
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
            {{ Form::label('question', 'Question:') }}
            {{ Form::textarea('question') }}
        </li>

        <li>
            {{ Form::label('answer', 'Answer:') }}
            {{ Form::textarea('answer') }}
        </li>

        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('published', 'Published:') }}
            {{ Form::text('published') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('questions.show', 'Cancel', $question->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
