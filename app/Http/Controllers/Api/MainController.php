<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Services\SettingsService;

class MainController extends Controller{
    public function getData(){
        $sliders = Slider::with('mainImage')->get();
        $settings = new SettingsService;
        return response()->json(['sliders' => $sliders, 'settings' => $settings->list()]);
    }
}
