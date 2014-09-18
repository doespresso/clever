@extends('layouts.scaffold')

@section('main')

<h1>Create Order</h1>

{{ Form::open(array('route' => 'orders.store')) }}
	<ul>
        <li>
            {{ Form::label('obj_type', 'Obj_type:') }}
            {{ Form::text('obj_type') }}
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


