<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Gallery;
use App\Slider;
class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 	public function dashboardHome()
    {
        return view('Admin.home');
    }

    // Gallery
    public function galleryView()
    {
    	$gallery = Gallery::all();
    	return view('Admin.galleries.gallerylist')->with('galleries', $gallery);
    }
    public function deletegallery($id)
    {
    	$gallery = Gallery::find($id);
    	$gallery->delete();
    	return back();
    }
    public function addgallery(Request $request)
    {
    	$gallery = new Gallery();
    	if ($request->hasFile('file')) {
    		$getfileName = time().'.'.$request->file->getClientOriginalExtension();
	        $filepath = $request->file->store('public/files'); 
	        $path = basename($filepath);
	        $file = 'storage/app/public/files/'.$path;
	        $gallery->image = $file;
    	} else {
            toastr()->error('Please Select an image');
    	}
    	$gallery->description = $request->desc;
    	$gallery->save();
    	return back();
    }
    public function changeStatus($value, $id)
    {
    	$gallery = Gallery::find($id);
    	if ($value == 'online') {
    		$gallery->status = '0';
    	} else {
    		$gallery->status = '1';
    	}
    	$gallery->save();
    	return back();
    }

    // Sliders
    // Gallery
    public function sliderView()
    {
    	$gallery = Slider::all();
    	return view('Admin.banners.slider')->with('galleries', $gallery);
    }
    public function deleteslider($id)
    {
    	$gallery = Slider::find($id);
    	$gallery->delete();
    	return back();
    }
    public function addslider(Request $request)
    {
    	$gallery = new Slider();
    	if ($request->hasFile('file')) {
    		$getfileName = time().'.'.$request->file->getClientOriginalExtension();
	        $filepath = $request->file->store('public/files'); 
	        $path = basename($filepath);
	        $file = 'storage/app/public/files/'.$path;
	        $gallery->image = $file;
    	} else {
            toastr()->error('Please Select an image');
    	}
    	$gallery->description = $request->desc;
    	$gallery->save();
    	return back();
    }
    public function changeSlider($value, $id)
    {
    	$gallery = Slider::find($id);
    	if ($value == 'online') {
    		$gallery->status = '0';
    	} else {
    		$gallery->status = '1';
    	}
    	$gallery->save();
    	return back();
    }



    public function logout()
    {
    	\Auth::logout();
    	return redirect('/');
    }
}
