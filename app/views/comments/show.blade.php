@extends('layouts.scaffold')

@section('main')

<h1>Show Comment</h1>

<p>{{ link_to_route('comments.index', 'Return to all comments') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Alias</th>
				<th>Comment</th>
				<th>User_id</th>
				<th>Service_id</th>
				<th>Published</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $comment->name }}}</td>
					<td>{{{ $comment->alias }}}</td>
					<td>{{{ $comment->comment }}}</td>
					<td>{{{ $comment->user_id }}}</td>
					<td>{{{ $comment->service_id }}}</td>
					<td>{{{ $comment->published }}}</td>
                    <td>{{ link_to_route('comments.edit', 'Edit', array($comment->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('comments.destroy', $comment->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
