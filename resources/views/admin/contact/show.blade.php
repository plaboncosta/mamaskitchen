@extends('layouts.app')
@section('title', 'Contact')
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
						<h4 class="card-title ">Contact Message Sent By {{ $contact->name }}</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table  id="myTable" class="table table-bordered">
								<tbody>
									<tr>
										<td>Name</td>
										<td>{{ $contact->name }}</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>{{ $contact->email }}</td>
									</tr>
									<tr>
										<td>Subject</td>
										<td>{{ $contact->subject }}</td>
									</tr>
									<tr>
										<td>Message</td>
										<td>{{ $contact->message }}</td>
									</tr>
								</tbody>
							</table>
							<a href="{{ route('admin.dashboard.index') }}" class="btn btn-danger">Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('js')
@endpush