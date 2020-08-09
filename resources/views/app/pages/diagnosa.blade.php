
@extends('app.layouts.app')

@section('main')
<div class="container py-5">
    <h1 class="h3 mb-3">Diagnosa</h1>
    @if (!session('gejala'))
    
    @if (session('msg'))
    <div class="alert {!! session('type') !!} alert-dismissible fade show" role="alert">
        {!! session('msg') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card mb-3">
        <div class="card-header">
            Gejala apa yang anda alami?
        </div>
        <div class="card-body question">
            <form method="post" action="{{route('diagnosa')}}">
                @csrf
                @method('post')
                <ul>
                    <div class="row">
                        <div class="col-md-6">
                            @foreach ($gejala as $data)
                                
                            <li>{{$data->nama}}</li>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{$data->kode}}" id="mungkin{{$data->kode}}" value="0.4">
                                <label class="form-check-label" for="mungkin{{$data->kode}}">Mungkin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{$data->kode}}" id="kemungkinan{{$data->kode}}" value="0.6">
                                <label class="form-check-label" for="kemungkinan{{$data->kode}}">Kemungkinan besar</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{$data->kode}}" id="hampir{{$data->kode}}" value="0.8">
                                <label class="form-check-label" for="hampir{{$data->kode}}">Hampir pasti</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{$data->kode}}" id="pasti{{$data->kode}}" value="1">
                                <label class="form-check-label" for="pasti{{$data->kode}}">Pasti</label>
                            </div>
                            @endforeach

                        </div>
                        {{-- <div class="col md-6">
                            <li>Batuk</li>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="batuk" id="batuk" value="option1">
                                <label class="form-check-label" for="batuk">Mungkin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="batuk" id="mingkin" value="option1">
                                <label class="form-check-label" for="mingkin">Kemungkinan besar</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="batuk" id="mingkin" value="option1">
                                <label class="form-check-label" for="mingkin">Hampir pasti</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="batuk" id="mingkin" value="option1">
                                <label class="form-check-label" for="mingkin">Pasti</label>
                            </div>
                        </div> --}}
                    </div>
                </ul>

                <button class="btn rounded-0 bg-dark-purple text-white">Jalankan Diagnosa</button>
            </form>
        </div>
    </div>
    @endif

    @if (session('gejala'))
    <div class="card mb-3">
        <div class="card-header">
            Gejala yang anda pilih
        </div>
        <div class="card-body gejala">
            <ul>
                <div class="row">
                    <div class="col-md-6">
                        @if (session('gejala'))
                            
                        @foreach (session('gejala') as $gejala)

                        <li>{{$gejala['kode']}} : {{$gejala['nama']}}</li>
                        
                        @endforeach
                        @endif
                    </div>
                </div>
            </ul>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            Rule sesuai gejala yang anda pilih
        </div>
        <div class="card-body gejala">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Bobot Pakar</th>
                        <th scope="col">Bobot User</th>
                        <th scope="col">Gejala</th>
                        <th scope="col">Penyakit</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach (session('rules') as $key => $value)
                        
                        @foreach ($value['gejala'] as $gejala)

                        <tr>
                            <th scope="row">{{++$no}}</th>
                            <td>{{$gejala['bobot_pakar']}}</td>
                            <td>{{$gejala['bobot_user']}}</td>
                            <td>{{$gejala['nama']}}</td>
                            <td>{{$value['penyakit']}}</td>
                        </tr>
                        @endforeach

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            Perhitungan CF
        </div>
        <div class="card-body gejala">
            <ol>
            @foreach (session('data_CF') as $cf)
                <li>{{$cf['penyakit']}}</li>
                <ul>
                    @foreach ($cf['CF'] as $list => $value)
                        <li>CF ke-{{++$list}} : {{round($value, 3)}}</li>
                    @endforeach
                    @if(session('data_CF_combine'))
                    @php $i = 0; @endphp
                        @foreach (session('data_CF_combine') as $item => $key)
                            @if ($cf['penyakit'] == $key['penyakit'])
                                @foreach ($key['CF_Combine'] as $cf_c)
                                <li>CF Combine Ke-{{++$i}} : {{ round($cf_c, 3)}}</li>
                                @endforeach
                            @endif
                                
                            @php $i=0; @endphp
                        @endforeach
                    @endif
                </ul>
            @endforeach
            </ol>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            Diagnosa
        </div>
        <div class="card-body gejala">
            
            <p class="text-center">
                Jadi Penyakit dengan CF terbesar adalah <i class="h5">{{session('nilai_akhir')['penyakit']}} </i> dengan nilai sebesar <u class="h5">{{ round(session('nilai_akhir')['CF'], 3)}} </u>
            </p>
            
        </div>
    </div>
    @endif
</div>
@endsection

@php
    session()->forget('gejala');
    session()->forget('rules');
    session()->forget('data_CF');
    session()->forget('data_CF_combine');
@endphp

@section('script')
    <script>
        let radio = document.querySelectorAll('.')
        $('.form-check-input').click(function(){
            if (this.getAttribute('checked')) { // check the presence of checked attr
                $(this).removeAttr('checked'); // if present remove that
            } else {
                $(this).attr('checked', true); // if not then make checked
            }
        })
    </script>
@endsection