@extends('layouts.scaffold')

@section('main')

<h1>All Services</h1>

<p>{{ link_to_route('services.create', 'Add new service') }}</p>

@if ($services->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Alias</th>
				<th>Announce</th>
				<th>Products</th>
				<th>Solutions</th>
				<th>specials</th>
				<th>Icon</th>
				<th>Published</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($services as $service)
				<tr>
					<td>{{{ $service->name }}}</td>
					<td>{{{ $service->alias }}}</td>
					<td>{{{ $service->announce }}}</td>
					<td>{{{ $service->products }}}</td>
					<td>{{{ $service->solutions }}}</td>
					<td>{{{ $service->specials }}}</td>
					<td>{{{ $service->icon }}}</td>
					<td>{{{ $service->published }}}</td>
                    <td>{{ link_to_route('services.edit', 'Edit', array($service->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('services.destroy', $service->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no services
@endif

@stop
