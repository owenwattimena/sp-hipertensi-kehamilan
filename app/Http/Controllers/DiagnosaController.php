<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Gejala;
use App\Penyakit;
use App\Rule;
class DiagnosaController extends Controller
{
    //
    public function index(){
        $data['gejala'] = Gejala::all();
        return view('app.pages.diagnosa', $data);
    }

    public function diagnosa(Request $request){
        
        $data = [];
        $gejala_pasien = $request->except('_token', '_method');
        if($gejala_pasien){
            $penyakit = Penyakit::all();

            // gejala
            foreach ($gejala_pasien as $key => $value) {
                $gejala = Gejala::where('kode', $key)->first();
                if($gejala){
                    $data['gejala'][] = [
                        "kode" => $gejala->kode,
                        "nama" => $gejala->nama
                    ];
                }
            }
            
            // rule
            foreach ($penyakit as $penyakit_key => $penyakit_value) {
                foreach ($gejala_pasien as $gejala_key => $gejala_value) {
                    $rule = Rule::where('kode_penyakit', $penyakit_value->kode)->where('kode_gejala', $gejala_key)->with(['gejala', 'penyakit'])->first();
                    if($rule){
                        $data['rules'][$penyakit_key]['kode'] = $penyakit_value->kode;
                        $data['rules'][$penyakit_key]['penyakit'] = $penyakit_value->nama;
                        $data['rules'][$penyakit_key]['gejala'][] = [
                            'kode' => $rule->gejala->kode,
                            'nama' => $rule->gejala->nama,
                            'bobot_pakar' => $rule->bobot_pakar,
                            'bobot_user' => $gejala_value
                        ];
                    }
                }
            }
            // dd($data['rules']);
            // cf
            foreach ($data['rules'] as $rule_key => $rule_value) {
                $data['data_CF'][$rule_key]['penyakit'] = $rule_value['penyakit']; 
                foreach ($rule_value['gejala'] as $gejela_key => $gejala_value) {
                    $data['data_CF'][$rule_key]['CF'][] = $gejala_value['bobot_pakar'] * $gejala_value['bobot_user']; 
                }
            }
            
            // cf combine
            foreach ($data['data_CF'] as $data_cf_key => $data_cf_value) {
                $length = count($data_cf_value['CF']) - 1;
                $cf_combine = 0;
                foreach ($data_cf_value['CF'] as $cf_key => $cf_value) {
                    // dd($cf_value);
                    if($length == $cf_key){
                    break;
                    }   
                
                    $data['data_CF_combine'][$data_cf_key]['penyakit'] = $data_cf_value['penyakit'];
                    
                    if ($cf_key == 0) {
                        $cf_combine = $cf_value;
                    }

                    $cf_combine = $cf_combine + ($data_cf_value['CF'][$cf_key + 1] * (1 - $cf_combine));
                    $data['data_CF_combine'][$data_cf_key]['CF_Combine'][] = $cf_combine;
                
                    // $new_cf = 
                }
                
            }
            
            // hasil akhir
            $nilai_cf = [];
            $list_penyakit = [];
            if(!isset($data['data_CF_combine'])){
                foreach ($data['data_CF'] as $data_cf_key => $data_cf_value) {
                    $list_penyakit[] = $data_cf_value['penyakit'];  
                    $nilai_cf[] = end($data_cf_value['CF']);
                }
                $cf_max = max($nilai_cf); 
                $penyakit = $list_penyakit[array_search($cf_max, $nilai_cf)];
            }else{
                foreach ($data['data_CF'] as $data_cf_key => $data_cf_value) {
                    $list_penyakit[] = $data_cf_value['penyakit'];  
                    $nilai_cf[] = end($data_cf_value['CF']);
                }
                foreach ($data['data_CF_combine'] as $data_cf_key => $data_cf_value) {
                    $list_penyakit[] = $data_cf_value['penyakit'];  
                    $nilai_cf[] = end($data_cf_value['CF_Combine']);
                }
                $cf_max = max($nilai_cf); 
                $penyakit = $list_penyakit[array_search($cf_max, $nilai_cf)];
            }

            $data['nilai_akhir'] = [
                'penyakit' => $penyakit,
                'CF' => $cf_max,
            ];
            // dd($data);

            session($data);
            return redirect()->action('DiagnosaController@index');
        }
        $alert = [
            "type" => "alert-danger",
            "msg"  => "Tidak ada data yang di pilih!"
        ];  
        return redirect()->route('diagnosa')->with($alert);

    }
}