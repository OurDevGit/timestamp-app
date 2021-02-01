@extends('layouts.web')
@section('title', 'Timestamp Shopify App | Homepage')

@section('content')
<div class="container">
	<h3 class="my-3">
		Orders
	</h3>
	<table class="table table-bordered mt-3">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Order Id</th>
				<th scope="col">Product Name</th>
				<th scope="col">Price</th>
				<th scope="col">Status</th>
				<th scope="col">Email</th>
				<th scope="col">Billing address</th>
				<th scope="col">shipping_address</th>
				<th scope="col">Customer name</th>
				<th scope="col">Default address</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($order_list->orders as $value)
				<tr>
					<th scope="row">{{ $loop->index + 1 }}</th>
					<td>{{ $value->order_number }}</td>
					<td>{{ $value->line_items['0']->title }}</td>
					<td>{{ $value->total_price }}</td>
					<td>{{ $value->financial_status }}</td>
					<td>{{ $value->email }}</td>
					<td>
						{{ $value->billing_address->name }}
						<br/>
						{{ $value->billing_address->address1 }}
						<br/>
						{{ $value->billing_address->phone }}
						<br/>
						{{ $value->billing_address->city }}
						<br/>
						{{ $value->billing_address->zip }}
						<br/>
						{{ $value->billing_address->province }}
						<br/>
						{{ $value->billing_address->country }}
					</td>
					<td>
						{{ $value->shipping_address->name }}
						<br/>
						{{ $value->shipping_address->address1 }}
						<br/>
						{{ $value->shipping_address->phone }}
						<br/>
						{{ $value->shipping_address->city }}
						<br/>
						{{ $value->shipping_address->zip }}
						<br/>
						{{ $value->shipping_address->province }}
						<br/>
						{{ $value->shipping_address->country }}
					</td>
					<td>{{ $value->customer->first_name }} {{ $value->customer->last_name }}</td>
					<td>
						{{ $value->customer->default_address->name }}
						<br/>
						{{ $value->customer->default_address->address1 }}
						<br/>
						{{ $value->customer->default_address->phone }}
						<br/>
						{{ $value->customer->default_address->city }}
						<br/>
						{{ $value->customer->default_address->zip }}
						<br/>
						{{ $value->customer->default_address->province }}
						<br/>
						{{ $value->customer->default_address->country }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection

@section('myScript')
<script>
	$(document).ready(function(){
		$("#orders-link").addClass('active');
	});
</script>
@endsection