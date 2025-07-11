<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class VirtualTourController extends Controller
{
    public function index(){
        return view('VirtualTour');
    }
}
