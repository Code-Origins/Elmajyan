<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller{

    public function index(){
        $sliders = Slider::with('mainImage')->get();
        return view('main', ['sliders' => $sliders]);
    }
}