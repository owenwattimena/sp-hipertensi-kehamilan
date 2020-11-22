<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyakit;

class HomeController extends Controller
{
    //
    public function index(){
        return view('app.pages.home');
    }

    public function info_penyakit(){
        $data['penyakit'] = Penyakit::all();
        return view('app.pages.info_penyakit', $data);
    }

}