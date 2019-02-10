<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\ReservationConfirmed;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function index()
    {
    	$reservations = Reservation::latest()->get();
    	return view('admin.reservation.index', compact('reservations'));
    }

    public function status($id)
    {
    	$reservation = Reservation::findOrFail($id);
    	$reservation->status = true;
    	$reservation->save();

        Notification::route('mail', $reservation->email)
            ->notify(new ReservationConfirmed());

    	Toastr::success('Reservation confirmed successfully', 'Success');

    	return redirect()->back();
    }

    public function destroy($id)
    {
    	Reservation::findOrFail($id)->delete();
    	Toastr::success('Reservation deleted successfully', 'Success');

    	return redirect()->back();
    }
}
