@extends('layouts.app')
@section('title', 'About')
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
						<h4 class="card-title ">ABOUT US</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table  id="myTable" class="table table-striped table-bordered">
								<thead class=" text-primary">
									<th>Id</th>
									<th>Title</th>
									<th>About Us</th>
									<th>Image</th>
									<th>Created At</th>
									<th>Action</th>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>{{ $about->title }}</td>
										<td>{!! str_limit($about->about, 15) !!}</td>
										<td>
											<img src="{{ asset('uploads/about/' . $about->image) }}" alt="{{ $about->title }}" style="width:130px; height: 90px;" class="img-thumbnail">
										</td>
										<td>{{ $about->created_at }}</td>
										<td>
											<a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-primary">Edit</a>
											<a href="{{ route('admin.about.destroy', $about->id) }}" class="btn btn-danger" onclick="if(confirm('Are you sure want to delete about?')){
												event.preventDefault();
												document.getElementById('delete-about-{{ $about->id }}').submit();} else{
													event.preventDefault();
												}">Delete</a>
											<form action="{{ route('admin.about.destroy', $about->id) }}" method="post" id="delete-about-{{ $about->id }}" style="display: none;">
												@csrf
												@method('delete')
											</form>
										</td>
									</tr>
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