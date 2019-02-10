<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
    	return view('admin.settings.create');
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|email',
    		'old_password' => 'required',
    		'password' => 'required|confirmed',
    	]);

    	$user = User::findOrFail(Auth::id());
    	$user->name = $request->name;
    	$user->email = $request->email;

    	$hashedPassword = Auth::user()->password;
    	if(Hash::check($request->old_password, $hashedPassword))
    	{
    		if(!Hash::check($request->password, $hashedPassword))
    		{
    			$user->password = Hash::make($request->password);
    			$user->save();
    			Toastr::success('User Profile updated successfully', 'Success');
    			Auth::logout();
    			return redirect()->back();
    		}
    		else
    		{
    			Toastr::error('New Password is as same as Old Password!', 'Access denied');
    		return redirect()->back();
    		}
    	}
    	else
    	{
    		Toastr::error('Old Password does not match!', 'Access denied');
    		return redirect()->back();
    	}
    }
}
