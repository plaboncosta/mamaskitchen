@extends('layouts.app')
@section('title', 'Reservation')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				@include('layouts.backend.partial.msg')
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">ALL Reservation</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table  id="myTable" class="table table-striped table-bordered">
								<thead class=" text-primary">
									<th>Id</th>
									<th>Name</th>
									<th>Phone</th>
									<th>Email</th>
									<th>Date Time</th>
									<th>Message</th>
									<th>Status</th>
									<th>Created At</th>
									<th>Action</th>
								</thead>
								<tbody>
									@foreach($reservations as $key=>$reservation)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $reservation->name }}</td>
										<td>{{ $reservation->phone }}</td>
										<td>{{ $reservation->email }}</td>
										<td>{{ $reservation->date_and_time }}</td>
										<td>{{ str_limit($reservation->message, 15) }}</td>
										<td>
											@if($reservation->status == true)
												<span class="btn btn-sm btn-success">confirmed</span>
											@else
												<span class="btn btn-sm btn-danger">not confirmed yet</span>
											@endif
										</td>
										<td>{{ $reservation->created_at }}</td>
										<td>
											@if($reservation->status == false)
												<a href="{{ route('admin.reservation.status', $reservation->id) }}" class="btn btn-info" onclick="if(confirm('Are you verified this number by phone?')){
												event.preventDefault();
												document.getElementById('status-reservation-{{ $reservation->id }}').submit();} else{
													event.preventDefault();
												}"><i class="material-icons">done</i></a>
											<form action="{{ route('admin.reservation.status', $reservation->id) }}" method="post" id="status-reservation-{{ $reservation->id }}" style="display: none;">
												@csrf
											</form>
											@endif
											<a href="{{ route('admin.reservation.destroy', $reservation->id) }}" class="btn btn-danger" onclick="if(confirm('Are you sure want to delete reservation?')){
												event.preventDefault();
												document.getElementById('delete-reservation-{{ $reservation->id }}').submit();} else{
													event.preventDefault();
												}"><i class="material-icons">delete</i></a>
											<form action="{{ route('admin.reservation.destroy', $reservation->id) }}" method="post" id="delete-reservation-{{ $reservation->id }}" style="display: none;">
												@csrf
												@method('delete')
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('js')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
	$(document).ready(function() {
$('#myTable').DataTable();
} );
</script>
@endpush