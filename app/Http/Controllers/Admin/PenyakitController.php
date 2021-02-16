<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penyakit;
class PenyakitController extends Controller
{
    //
    public function index(){
        // ->orderBy('kode_penyakit', 'asc')->get()->last();
        $penyakit = Penyakit::orderBy('kode', 'asc')->get();
        $count_penyakit = count($penyakit);
        if ($count_penyakit <= 0) {
            $kode_baru = 'P001';
        }else{
            $kode_baru = generate_code($penyakit->last()->kode);
        }
        $data = [
            'penyakit' => $penyakit,
            'kode_baru' => $kode_baru,
        ];
        return view('admin.pages.penyakit', $data);
    }

    public function store(Request $request){
        // dd($request);
        if ($request) {
            # code...
            $penyakit = new Penyakit;
            $penyakit->kode = $request->kode;
            $penyakit->nama = $request->nama;
            $penyakit->definisi = $request->definisi;
            $penyakit->gejala = $request->gejala;
            $penyakit->pencegahan = $request->pencegahan;
            $penyakit->pengobatan = $request->pengobatan;
            if ($penyakit->save()) {
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
            return redirect()->route('penyakit')->with($alert);
        }
    }

    public function edit($kode){

        $data['penyakit'] = Penyakit::where('kode', $kode)->get()->first();
        return view('admin.pages.penyakit.edit', $data);
    }

    public function update(Request $request, $kode){
        if ($request) {
            # code...
            $penyakit = Penyakit::where('kode',$kode)->get()->first();
            $penyakit->kode = $request->kode;
            $penyakit->nama = $request->nama;
            $penyakit->definisi = $request->definisi;
            $penyakit->gejala = $request->gejala;
            $penyakit->pencegahan = $request->pencegahan;
            $penyakit->pengobatan = $request->pengobatan;
            if ($penyakit->save()) {
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
            return redirect()->route('penyakit')->with($alert);
        }
    }

    public function delete($id){
        $penyakit = Penyakit::findOrFail($id);
        if ($penyakit->forceDelete()) {
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
        return redirect()->route('penyakit')->with($alert);
    }
}