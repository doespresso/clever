@extends('layouts.main')

@section('main')

<h1>Show Category</h1>

<p>{{ link_to_route('categories.index', 'Return to all categories') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Alias</th>
				<th>Published</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $category->name }}}</td>
					<td>{{{ $category->alias }}}</td>
					<td>{{{ $category->published }}}</td>
		</tr>
	</tbody>
</table>

@stop
