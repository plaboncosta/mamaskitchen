@extends('layouts.app')
@section('title', 'Dashboard')
@push('css')

@endpush
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">content_copy</i>
            </div>
            <p class="card-category">Category\Item</p>
            <h3 class="card-title">{{ $categoryCount }}\{{ $itemCount }}
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons text-danger">warning</i>
              <a href="#pablo">Get More Space...</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">slideshow</i>
            </div>
            <p class="card-category">Slider</p>
            <h3 class="card-title">{{ $sliderCount }}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">date_range</i> <a href="{{ route('admin.slider.index') }}">click for details ...</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category">Reservation</p>
            <h3 class="card-title">{{ $reservations->count() }}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">local_offer</i>
              Not confirmed reservation
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="material-icons">message</i>
            </div>
            <p class="card-category">Contact</p>
            <h3 class="card-title">{{ $contactCount }}</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">update</i> Just Updated
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        @include('layouts.backend.partial.msg')
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Not Confirmed Reservation</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table  id="myTable" class="table table-striped table-bordered">
                <thead class=" text-primary">
                  <th>Id</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach($reservations as $key=>$reservation)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $reservation->name }}</td>
                    <td>{{ $reservation->phone }}</td>
                    <td>
                      @if($reservation->status == true)
                        <span class="btn btn-sm btn-success">confirmed</span>
                      @else
                        <span class="btn btn-sm btn-danger">not confirmed yet</span>
                      @endif
                    </td>
                    <td>{{ $reservation->created_at }}</td>
                    <td>
                      @if($reservation->status == false)
                        <a href="{{ route('admin.reservation.status', $reservation->id) }}" class="btn btn-info" onclick="if(confirm('Are you verified this number by phone?')){
                        event.preventDefault();
                        document.getElementById('status-reservation-{{ $reservation->id }}').submit();} else{
                          event.preventDefault();
                        }"><i class="material-icons">done</i></a>
                      <form action="{{ route('admin.reservation.status', $reservation->id) }}" method="post" id="status-reservation-{{ $reservation->id }}" style="display: none;">
                        @csrf
                      </form>
                      @endif
                      <a href="{{ route('admin.reservation.destroy', $reservation->id) }}" class="btn btn-danger" onclick="if(confirm('Are you sure want to delete reservation?')){
                        event.preventDefault();
                        document.getElementById('delete-reservation-{{ $reservation->id }}').submit();} else{
                          event.preventDefault();
                        }"><i class="material-icons">delete</i></a>
                      <form action="{{ route('admin.reservation.destroy', $reservation->id) }}" method="post" id="delete-reservation-{{ $reservation->id }}" style="display: none;">
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

@endpush