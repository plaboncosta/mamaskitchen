@extends('layouts.app')
@section('title', 'Social')
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
						<h4 class="card-title ">Social Icons</h4>
					</div>
					<div class="card-body">
						<form action="{{ route('admin.social.update') }}" method="post">
							@csrf
							@method('put')
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="facebook"><b>Facebook</b></label>
										<input id="facebook" name="facebook" type="text" class="form-control" value="{{ $social->facebook }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="twitter"><b>Twitter</b></label>
										<input id="twitter" name="twitter" type="text" class="form-control" value="{{ $social->twitter }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="google_plus"><b>Google Plus</b></label>
										<input id="google_plus" name="google_plus" type="text" class="form-control" value="{{ $social->google_plus }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="linkedin"><b>Linkedin</b></label>
										<input id="linkedin" name="linkedin" type="text" class="form-control" value="{{ $social->linkedin }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="btn btn-primary">
									<i class="material-icons">done</i>
									update</button>
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