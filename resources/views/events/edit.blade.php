@extends('layouts.web')
@section('title', 'Timestamp Shopify App | Add New Event')

@section('content')
<div class="container">
	<h3 class="my-3">
		Update Event
	</h3>

	<form method="POST" action="{{ route('update-event', $row->id) }}">
		@csrf
		@method('PATCH')
	  <div class="mb-3">
	    {{-- <label for="exampleInputEventName1" class="form-label">Event Name</label> --}}
	    <input placeholder="Name" type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' :'' }}" id="exampleInputEventName1" value="{{ $row->name }}">
	    @error('name')
        	<div class="invalid-feedback">
            	{{ $message }}
        	</div>
      	@enderror
	  </div>

	  <div class="mb-3">
	    {{-- <label for="exampleInputEventDesc1" class="form-label">Event Description</label> --}}
	    <textarea placeholder="Description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' :'' }}" id="exampleInputEventDesc1" rows="5">{{ $row->description }}</textarea>
	    @error('description')
        	<div class="invalid-feedback">
            	{{ $message }}
        	</div>
      	@enderror
	  </div>

	  <div class="mb-3">
	    {{-- <label for="exampleInputLaps1" class="form-label">No. of Laps</label> --}}
	    <select name="laps" class="form-select {{ $errors->has('laps') ? 'is-invalid' :'' }}" id="exampleInputLaps1">
	    	<option value="">Please choose number of laps</option>
	    	<option {{ ($row->laps == '1') ? 'selected' : '' }}>1</option>
	    	<option {{ ($row->laps == '2') ? 'selected' : '' }}>2</option>
	    	<option {{ ($row->laps == '3') ? 'selected' : '' }}>3</option>
	    	<option {{ ($row->laps == '4') ? 'selected' : '' }}>4</option>
	    	<option {{ ($row->laps == '5') ? 'selected' : '' }}>5</option>
	    </select>
	    @error('laps')
        	<div class="invalid-feedback">
            	{{ $message }}
        	</div>
      	@enderror
	  </div>

	  <div class="mb-3">
	    {{-- <label for="exampleInputStatus1" class="form-label">Status</label> --}}
	    <select name="status" class="form-select {{ $errors->has('status') ? 'is-invalid' :'' }}" id="exampleInputStatus1">
	    	<option value="">Please choose status of event</option>
	    	<option {{ ($row->status == '1') ? 'selected' : '' }} value="1">Active</option>
	    	<option {{ ($row->status == '0') ? 'selected' : '' }} value="0">Inactive</option>
	    </select>
	    @error('status')
        	<div class="invalid-feedback">
            	{{ $message }}
        	</div>
      	@enderror
	  </div>

	  <button type="submit" class="btn btn-primary">
          {{ __('Submit') }}
      </button>
      <a class="btn btn-danger" href="{{ route('events') }}" title="Cancel">Cancel</a>
	</form>
</div>
@endsection

@section('myScript')
<script>
	$(document).ready(function(){
		$("#events-link").addClass('active');
	});
</script>
@endsection