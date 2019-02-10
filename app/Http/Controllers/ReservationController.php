<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserve(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|string',
    		'email' => 'required|email',
    		'phone' => 'required|min:11',
    		'dateandtime' => 'required',
    	]);

    	$reservation = new Reservation();
    	$reservation->name = $request->name;
    	$reservation->email = $request->email;
    	$reservation->phone = $request->phone;
    	$reservation->date_and_time = $request->dateandtime;
    	$reservation->message = $request->message;
    	$reservation->save();

    	Toastr::Success('Reservation request sent successfully . We will confirm you shortly', 'Success');
    	return redirect()->back();
    }
}
