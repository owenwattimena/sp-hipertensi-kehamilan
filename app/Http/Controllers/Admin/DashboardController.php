<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penyakit;
use App\Gejala;

class DashboardController extends Controller
{
    //
    public function index(){
        $data['penyakit'] = Penyakit::all();
        $data['gejala'] = Gejala::all();
        return view('admin.pages.dashboard',$data);
    }
}