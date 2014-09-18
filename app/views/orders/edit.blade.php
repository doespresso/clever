@extends('layouts.scaffold')

@section('main')

<h1>Edit Order</h1>
{{ Form::model($order, array('method' => 'PATCH', 'route' => array('orders.update', $order->id))) }}
	<ul>
        <li>
            {{ Form::label('obj_type', 'Obj_type:') }}
            {{ Form::text('obj_type') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('orders.show', 'Cancel', $order->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
