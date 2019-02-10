<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::findOrFail(2);
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $this->validate($request, [
            'title' => 'required',
            'about' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,bmp',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);
        if(isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if(!file_exists('uploads/about'))
            {
                mkdir('uploads/about', 0777, true);
            }

            if(file_exists('uploads/about/' . $about->image))
            {
                unlink('uploads/about/' . $about->image);
            }
            $image->move('uploads/about', $imagename);
        }
        else
        {
            $imagename = $about->image;
        }

        $about->title = $request->title;
        $about->about = $request->about;
        $about->image = $imagename;
        $about->save();

        Toastr::success('About Us updated successfully', 'Success');
        return redirect()->route('admin.about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        /*if(file_exists('uploads/about/' . $about->image))
        {
            unlink('uploads/about/' . $about->image);
        }
        $about->delete();*/
        Toastr::error('Sorry, you can not delete this!', 'Access denied!');
        return redirect()->back();
    }
}
