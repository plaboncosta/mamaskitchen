<?php

namespace App\Http\Controllers;

use App\About;
use App\Category;
use App\Item;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $about = About::findOrFail(2);
        $categories = Category::all();
        $items = Item::all();
        $sliders = Slider::all();
        return view('welcome', compact('sliders', 'categories', 'items', 'about'));
    }
}
