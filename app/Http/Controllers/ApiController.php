<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Slider;
class ApiController extends Controller
{
    public function gallery()
    {
    	$gallery = Gallery::where('status', '1')->limit(6)->get();
    	return response()->json(['gallery'=>$gallery]);
    }
    public function galleryAll()
    {
    	$gallery = Gallery::where('status', '1')->get();
    	return response()->json(['gallery'=>$gallery]);
    }
    public function slider()
    {
    	$slider = Slider::where('status', '1')->limit(3)->get();
    	return response()->json(['slider'=>$slider]);
    }
}
