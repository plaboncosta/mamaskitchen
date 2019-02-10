@extends('layouts.app')
@section('title', 'Settings')
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
						<h4 class="card-title ">ADMIN PROFILE SETTINGS</h4>
					</div>
					<div class="card-body">
						<form action="{{ route('admin.settings.update') }}" method="post">
							@csrf
							@method('put')
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="name">Name</label>
										<input id="name" name="name" type="text" class="form-control" value="{{ Auth::user()->name }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="email">Email</label>
										<input id="email" name="email" type="text" class="form-control" value="{{ Auth::user()->email }}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="old_password">Old Password</label>
										<input id="old_password" name="old_password" type="password" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="new_password">New Password</label>
										<input id="new_password" name="password" type="password" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating" for="confirm_password">Confirm Password</label>
										<input id="confirm_password" name="password_confirmation" type="password" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
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