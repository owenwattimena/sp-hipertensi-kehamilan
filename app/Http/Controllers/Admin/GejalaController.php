<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gejala;

class GejalaController extends Controller
{
    //
    public function index(){
        $gejala = Gejala::all();
        $count_gejala = count($gejala);
        if ($count_gejala <= 0) {
            $kode_baru = 'G001';
        }else{
            $kode_baru = generate_code($gejala->last()->kode);
            // $kode_tertinggi = $gejala->last()->kode;
            // $array_kode_tertinggi = explode('G',$kode_tertinggi);
            // $angka_baru = $array_kode_tertinggi[1] + 1;
            // if ($angka_baru < 10) {
            //     $kode_baru = 'G' . '00' . $angka_baru;
            // }else if($angka_baru < 100){
            //     $kode_baru = 'G' . '0' . $angka_baru;
            // }else{
            //     $kode_baru = 'G' . $angka_baru;
            // }
            // $kode_baru = str_split($kode_tertinggi);
            // dd($kode_baru);
        }
        $data['gejala'] =$gejala;
        $data['kode_baru'] = $kode_baru;

        return view('admin.pages.gejala', $data);
    }

    public function store(Request $request){
        if ($request) {
            # code...
            $gejala = new Gejala;
            $gejala->kode = $request->kode;
            $gejala->nama = $request->nama;
            if ($gejala->save()) {
                # code...
                $alert = [
                    "type" => "alert-success",
                    "msg"  => "Data berhasil tambahkan!"
                ];
            }else{
                $alert = [
                    "type" => "alert-danger",
                    "msg"  => "Data gagal tambahkan!"
                ];
            }
            return redirect()->route('gejala')->with($alert);
        }
    }
    
    public function update(Request $request, $id){
        if ($request) {
            # code...
            $gejala = Gejala::findOrFail($id);
            $gejala->nama = $request->nama;
            if ($gejala->save()) {
                # code...
                $alert = [
                    "type" => "alert-success",
                    "msg"  => "Data berhasil diubah!"
                ];
            }else{
                $alert = [
                    "type" => "alert-danger",
                    "msg"  => "Data gagal diubah!"
                ];
            }
            return redirect()->route('gejala')->with($alert);
        }
    }

    public function delete($id){
        $gejala = Gejala::findOrFail($id);
        if ($gejala->forceDelete()) {
            # code...
            $alert = [
                "type" => "alert-success",
                "msg"  => "Data berhasil hapus!"
            ];
        }else{
            $alert = [
                "type" => "alert-danger",
                "msg"  => "Data gagal dihapus!"
            ];   
        }
        return redirect()->route('gejala')->with($alert);
    }
}