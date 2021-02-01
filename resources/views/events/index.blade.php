@extends('layouts.web')
@section('title', 'Timestamp Shopify App | Events')

@section('content')
<div class="container">
	@if (session('status'))
        <div class="alert alert-success my-3" role="alert">
            {{ session('status') }}
        </div>
    @endif

	<h3 class="my-3">
		Events
		<a href="{{ route('add-event') }}" class="btn btn-primary float-end" title="Add New Event">Add New Event</a>
	</h3>

	<table class="table table-bordered mt-3">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Event Name</th>
				<th scope="col">Laps</th>
				<th scope="col">Status</th>
				<th scope="col">Actions</th>
			</tr>
		</thead>
		<tbody>
			@if($results->count() > 0)
				@foreach($results as $row)
					<tr>
						<th scope="row">{{ $loop->index + 1 }}</th>
						<td>{{ $row->name }}</td>
						<td>{{ $row->laps }}</td>
						<td>
							@if($row->status == '1')
								<span class="badge bg-success">Active</span>
							@else
								<span class="badge bg-danger">Inactive</span>
							@endif
						</td>
						<td>
							<a href="{{ route('edit-event', $row->id) }}" class="btn btn-outline-primary">Edit</a>

							<form action="{{ route('delete-event', $row->id)}}" method="post" style="display: inline;">  
								@csrf  
								@method('DELETE')  
								<button type="submit" class="btn btn-outline-danger ms-3" onclick="return confirm('Are you sure?');">Delete</button>
							</form>
						</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td class="text-center" colspan="5">No results found.</td>
				</tr>
			@endif
		</tbody>
	</table>

	{{ $results->links() }}
</div>
@endsection

@section('myScript')
<script>
	$(document).ready(function(){
		$("#events-link").addClass('active');
	});
</script>
@endsection