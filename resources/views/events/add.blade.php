@extends('layouts.web')
@section('title', 'Timestamp Shopify App | Add New Event')

@section('content')
<div class="container">
	<h3 class="my-3">
		Add New Event
	</h3>

	<form method="POST" action="{{ route('create-event') }}">
      @csrf
	  <div class="mb-3">
	    {{-- <label for="exampleInputEventName1" class="form-label">Event Name</label> --}}
	    <input placeholder="Name" type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' :'' }}" id="exampleInputEventName1">
	    @error('name')
        	<div class="invalid-feedback">
            	{{ $message }}
        	</div>
      	@enderror
	  </div>

	  <div class="mb-3">
	    {{-- <label for="exampleInputEventDesc1" class="form-label">Event Description</label> --}}
	    <textarea placeholder="Description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' :'' }}" id="exampleInputEventDesc1" rows="5"></textarea>
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
	    	<option>1</option>
	    	<option>2</option>
	    	<option>3</option>
	    	<option>4</option>
	    	<option>5</option>
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
	    	<option value="1">Active</option>
	    	<option value="0">Inactive</option>
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