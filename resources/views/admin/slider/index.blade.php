@extends('layouts.app')
@section('title', 'Slider')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				@include('layouts.backend.partial.msg')
				<a href="{{ route('admin.slider.create') }}" class="btn btn-info">ADD NEW SLIDER</a>
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">ALL SLIDER</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table  id="myTable" class="table table-striped table-bordered">
								<thead class=" text-primary">
									<th>Id</th>
									<th>Title</th>
									<th>Sub Title</th>
									<th>Image</th>
									<th>Created At</th>
									<th>Action</th>
								</thead>
								<tbody>
									@foreach($sliders as $key=>$slider)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ str_limit($slider->title, 10) }}</td>
										<td>{{ str_limit($slider->sub_title, 15) }}</td>
										<td>
											<img src="{{ asset('uploads/slider/' . $slider->image) }}" alt="{{ $slider->title }}" style="width:130px; height: 90px;" class="img-thumbnail">
										</td>
										<td>{{ $slider->created_at }}</td>
										<td>
											<a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-primary">Edit</a>
											<a href="{{ route('admin.slider.destroy', $slider->id) }}" class="btn btn-danger" onclick="if(confirm('Are you sure want to delete slider?')){
												event.preventDefault();
												document.getElementById('delete-slider-{{ $slider->id }}').submit();} else{
													event.preventDefault();
												}">Delete</a>
											<form action="{{ route('admin.slider.destroy', $slider->id) }}" method="post" id="delete-slider-{{ $slider->id }}" style="display: none;">
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