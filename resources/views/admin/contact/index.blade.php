@extends('layouts.app')
@section('title', 'Contact')
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
						<h4 class="card-title ">ALL CONTACT MESSAGE</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table  id="myTable" class="table table-striped table-bordered">
								<thead class=" text-primary">
									<th>Id</th>
									<th>Name</th>
									<th>Email</th>
									<th>Subject</th>
									<th>Message</th>
									<th>Sent At</th>
									<th>Action</th>
								</thead>
								<tbody>
									@foreach($contacts as $key=>$contact)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $contact->name }}</td>
										<td>{{ $contact->email }}</td>
										<td>{{ $contact->subject }}</td>
										<td>{{ str_limit($contact->message, 15) }}</td>
										<td>{{ $contact->created_at }}</td>
										<td>
											<a href="{{ route('admin.contact.show', $contact->id) }}" class="btn btn-primary">
												view
											</a>
											<a href="{{ route('admin.contact.destroy', $contact->id) }}" class="btn btn-danger" onclick="if(confirm('Are you sure want to delete contact?')){
												event.preventDefault();
												document.getElementById('delete-contact-{{ $contact->id }}').submit();} else{
												event.preventDefault();
											}">Delete</a>
											<form action="{{ route('admin.contact.destroy', $contact->id) }}" method="post" id="delete-contact-{{ $contact->id }}" style="display: none;">
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