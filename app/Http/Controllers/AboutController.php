<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view('/about/about');
    }

    public function aksaranta(){
        return view('about/aksaranta');
    }

    public function history(){
        return view('history/history');
    }

    public function kamus(){
        return view('kamus/kamus');
    }
    public function kamusAksara(){
        return view('kamus/kamus-aksara');
    }
    public function animasi(){
        return view('about/animasi');
    }



}
