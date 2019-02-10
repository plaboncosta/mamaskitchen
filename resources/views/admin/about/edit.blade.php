@extends('layouts.app')
@section('title', 'About')
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
						<h4 class="card-title ">EDIT ABOUT US</h4>
					</div>
					<div class="card-body">
						<form action="{{ route('admin.about.update', $about->id) }}" method="post" enctype="multipart/form-data">
							@csrf
							@method('put')
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="title">Title</label>
										<input id="title" name="title" type="text" class="form-control" value="{{ $about->title }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="about">About Us</label>
										<textarea name="about" id="about" cols="30" rows="10" class="form-control">{!! html_entity_decode($about->about) !!}</textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="image">Select About Image</label><br>
									<input id="image" name="image" type="file"><br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<a href="{{ route('admin.about.index') }}" class="btn btn-danger">Back</a>
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
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
@endpush