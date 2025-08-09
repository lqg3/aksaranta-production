<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class VirtualTourController extends Controller
{
    public function index(){
        return view('virtual/VirtualTour');
    }

    public function danauToba(){
        return view('virtual/danautoba');
    }

    public function airTerjunPiso(){
        return view('virtual/airterjunPiso');
    }

    public function bukitHolbung(){
        return view('virtual/bukitHolbung');
    }

    public function sibeabea(){
        return view('virtual/sibeabea');
    }

    public function tamanAlamLubini(){
        return view('virtual/tamanAlamLubini');
    }

    public function arrasyid(){
        return view('virtual/arrasyid');
    }

    public function grahaBunda(){
        return view('virtual/grahaBunda');
    }

    public function funland(){
        return view('virtual/mikieFunland');
    }


}
