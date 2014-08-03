@extends('layouts.scaffold')

@section('main')

<h1>Edit Article</h1>
{{ Form::model($article, array('method' => 'PATCH', 'route' => array('articles.update', $article->id))) }}
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
            {{ Form::label('comment', 'Comment:') }}
            {{ Form::textarea('comment') }}
        </li>

        <li>
            {{ Form::label('category_id', 'Category_id:') }}
            {{ Form::input('number', 'category_id') }}
        </li>

        <li>
            {{ Form::label('published', 'Published:') }}
            {{ Form::text('published') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('articles.show', 'Cancel', $article->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
