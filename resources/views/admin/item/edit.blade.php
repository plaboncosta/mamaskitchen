@extends('layouts.app')
@section('title', 'Item')
@push('css')
@endpush
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				@include('layouts.backend.partial.msg')
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">EDIT ITEM</h4>
					</div>
					<div class="card-body">
						<form action="{{ route('admin.item.update', $item->id) }}" method="post" enctype="multipart/form-data">
							@csrf
							@method('put')
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="category">Category Name</label>
										<select name="category" id="category" class="form-control">
											@foreach($categories as $category)
											<option value="{{ $category->id }}" {{ $category->id == $item->category->id ? 'selected' : '' }}>{{ $category->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="name">Item Name</label>
										<input id="name" name="name" type="text" class="form-control" value="{{ $item->name }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="description">Description</label>
										<textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $item->description }}</textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="price">Price</label>
										<input id="price" name="price" type="number" class="form-control" value="{{ $item->price }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="image">Select Item Image</label><br>
									<input id="image" name="image" type="file">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<a href="{{ route('admin.item.index') }}" class="btn btn-danger">Back</a>
									<button type="submit" class="btn btn-primary">	Save</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('js')
@endpush