@extends('layouts.app')
@section('title', 'Slider')
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
						<h4 class="card-title ">ADD NEW SLIDER</h4>
					</div>
					<div class="card-body">
						<form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="title">Title</label>
										<input id="title" name="title" type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="sub_title">Sub Title</label>
										<input id="sub_title" name="sub_title" type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="image">Select Slider Image</label><br>
									<input id="image" name="image" type="file"><br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<a href="{{ route('admin.slider.index') }}" class="btn btn-danger">Back</a>
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