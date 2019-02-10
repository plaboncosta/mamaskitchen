@extends('layouts.app')
@section('title', 'Category')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				@include('layouts.backend.partial.msg')
				<a href="{{ route('admin.category.create') }}" class="btn btn-info">ADD NEW CATEGORY</a>
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">ALL CATEGORY</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table  id="myTable" class="table table-striped table-bordered">
								<thead class=" text-primary">
									<th>Id</th>
									<th>Name</th>
									<th>Created At</th>
									<th>Updated At</th>
									<th>Action</th>
								</thead>
								<tbody>
									@foreach($categories as $key=>$category)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $category->name }}</td>
										<td>{{ $category->created_at }}</td>
										<td>{{ $category->updated_at }}</td>
										<td>
											<a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
											<a href="{{ route('admin.category.destroy', $category->id) }}" class="btn btn-danger" onclick="if(confirm('Are you sure want to delete category?')){
												event.preventDefault();
												document.getElementById('delete-category-{{ $category->id }}').submit();} else{
													event.preventDefault();
												}">Delete</a>
											<form action="{{ route('admin.category.destroy', $category->id) }}" method="post" id="delete-category-{{ $category->id }}" style="display: none;">
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