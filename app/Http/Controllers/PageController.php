<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller{
    // Halaman index awal
    public function index(){
        return view('pages/index');
    }
}
