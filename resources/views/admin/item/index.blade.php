@extends('layouts.app')
@section('title', 'Item')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				@include('layouts.backend.partial.msg')
				<a href="{{ route('admin.item.create') }}" class="btn btn-info">ADD NEW ITEM</a>
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">ALL ITEM</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table  id="myTable" class="table table-striped table-bordered">
								<thead class=" text-primary">
									<th>Id</th>
									<th>Namae</th>
									<th>Category</th>
									<th>Image</th>
									<th>Description</th>
									<th>Price</th>
									<th>Created At</th>
									<th>Action</th>
								</thead>
								<tbody>
									@foreach($items as $key=>$item)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $item->name }}</td>
										<td>{{ $item->category->name }}</td>
										<td>
											<img src="{{ asset('uploads/item/' . $item->image) }}" alt="{{ $item->name }}" class="img-thumbnail" style="width: 130px; height: 90px;">
										</td>
										<td>{{ str_limit($item->description, 20) }}</td>
										<td>{{ $item->price }}</td>
										<td>{{ $item->created_at }}</td>
										<td>
											<a href="{{ route('admin.item.edit', $item->id) }}" class="btn btn-primary">Edit</a>
											<a href="{{ route('admin.item.destroy', $item->id) }}" class="btn btn-danger" onclick="if(confirm('Are you sure want to delete item?')){
												event.preventDefault();
												document.getElementById('delete-item-{{ $item->id }}').submit();} else{
													event.preventDefault();
												}">Delete</a>
											<form action="{{ route('admin.item.destroy', $item->id) }}" method="post" id="delete-item-{{ $item->id }}" style="display: none;">
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