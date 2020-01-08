<?php

namespace App\Http\Controllers;

use App\Product;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $items = 0;
        return view('index', compact('products', 'items'));
    }

    public function contact() {
        return view('contact');
    }
    public function help() {
        return view('help');
    }
}
