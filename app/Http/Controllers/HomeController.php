<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class HomeController extends Controller
{
    public function home() {
        return view('welcome');
    }

    public function about() {
        return view('about-us');
    }

    public function pricing() {
        $plans = Plan::get();

        return view('pricing', compact('plans'));
    }

    public function contact() {
        return view('contact-us');
    }

    public function helpCenter() {
        return view('help-center');
    }
}
