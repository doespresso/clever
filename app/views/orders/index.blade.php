@extends('layouts.scaffold')

@section('main')

<h1>All Orders</h1>

<p>{{ link_to_route('orders.create', 'Add new order') }}</p>

@if ($orders->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Obj_type</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($orders as $order)
				<tr>
					<td>{{{ $order->obj_type }}}</td>
                    <td>{{ link_to_route('orders.edit', 'Edit', array($order->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('orders.destroy', $order->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no orders
@endif

@stop
