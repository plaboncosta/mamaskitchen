<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
    	$contacts = Contact::latest()->get();
    	return view('admin.contact.index', compact('contacts'));
    }

    public function show($id)
    {
    	$contact = Contact::findOrFail($id);
    	return view('admin.contact.show', compact('contact'));
    }

    public function destroy($id)
    {
    	Contact::findOrFail($id)->delete();
    	Toastr::success('Contact Message Deleted Successfully', 'Success');

    	return redirect()->back();
    }
}
