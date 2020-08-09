<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penyakit;
use App\Gejala;
use App\Rule;
class RuleController extends Controller
{
    //
    public function index(){
        $data['penyakit'] = Penyakit::all();
        $data['gejala'] = Gejala::all();
        $data['rules'] = Rule::with(['gejala', 'penyakit'])->get();
        // dd($data['rules']);
        return view('admin.pages.rule', $data);
    }

    public function store(Request $request){
        if ($request) {
            # code...
            $rule = new Rule;
            $rule->kode_gejala   = $request->gejala;
            $rule->kode_penyakit = $request->penyakit;
            $rule->bobot_pakar   = $request->bobot;
            if ($rule->save()) {
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
            return redirect()->route('rule')->with($alert);
        }
    }

    public function update(Request $request, $id){
        if ($request) {
            # code...
            $rule = Rule::findOrFail($id);
            $rule->kode_gejala   = $request->gejala;
            $rule->kode_penyakit = $request->penyakit;
            $rule->bobot_pakar   = $request->bobot;
            if ($rule->save()) {
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
            return redirect()->route('rule')->with($alert);
        }
    }

    public function delete($id){
        $rule = Rule::findOrFail($id);
        if ($rule->forceDelete()) {
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
        return redirect()->route('rule')->with($alert);
    }
}