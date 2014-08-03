@extends('layouts.scaffold')

@section('main')

<h1>Edit Service</h1>
{{ Form::model($service, array('method' => 'PATCH', 'route' => array('services.update', $service->id))) }}
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
            {{ Form::label('announce', 'Announce:') }}
            {{ Form::text('announce') }}
        </li>


        <li>
            {{ Form::label('products', 'Products:') }}
            {{ Form::textarea('products') }}
        </li>

        <li>
            {{ Form::label('solutions', 'Solutions:') }}
            {{ Form::textarea('solutions') }}
        </li>

        <li>
            {{ Form::label('specials', 'specials:') }}
            {{ Form::textarea('specials') }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('services.show', 'Cancel', $service->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
