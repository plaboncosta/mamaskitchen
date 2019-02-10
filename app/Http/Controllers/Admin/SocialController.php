<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Social;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
    	$social = Social::findOrFail(1);
    	return view('admin.social.index', compact('social'));
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
    		'facebook' => 'required',
    		'twitter' => 'required',
    		'google_plus' => 'required',
    		'linkedin' => 'required',
    	]);

    	$social = Social::findOrFail(1);
    	$social->facebook =$request->facebook;
    	$social->twitter =$request->twitter;
    	$social->google_plus =$request->google_plus;
    	$social->linkedin =$request->linkedin;
    	$social->save();

    	Toastr::success('Social Icons updated successfully', 'Success');
    	return redirect()->back();
    }
}
