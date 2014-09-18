@extends('layouts.scaffold')

@section('main')

<h1>Show Order</h1>

<p>{{ link_to_route('orders.index', 'Return to all orders') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Obj_type</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $order->obj_type }}}</td>
                    <td>{{ link_to_route('orders.edit', 'Edit', array($order->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('orders.destroy', $order->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
