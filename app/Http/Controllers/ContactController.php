<?php

namespace App\Http\Controllers;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|string',
    		'email' => 'required|email',
    		'subject' => 'required|string',
    		'message' => 'required|string',
    	]);

    	$contact = new Contact();
    	$contact->name = $request->name;
    	$contact->email = $request->email;
    	$contact->subject = $request->subject;
    	$contact->message = $request->message;
    	$contact->save();

    	Toastr::success('Contact Message sent successfully', 'Success');
    	return redirect()->back();
    }
}
