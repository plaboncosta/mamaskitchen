@extends('layouts.app')
@section('title', 'Category')
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
						<h4 class="card-title ">ADD NEW CATEGORY</h4>
					</div>
					<div class="card-body">
						<form action="{{ route('admin.category.store') }}" method="post">
							@csrf
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="name">Category Name</label>
										<input id="name" name="name" type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<a href="{{ route('admin.category.index') }}" class="btn btn-danger">Back</a>
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