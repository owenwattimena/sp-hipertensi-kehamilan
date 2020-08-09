@extends('app.layouts.app')

@section('main')
<div class="jumbotron jumbotron-fluid" style="background-image: url(assets/app/img/banner.png) ; background-size: cover;">
    <div class="container text-white">
        <h1 class="display-4">Selamat datang di<br>SISTEM PAKAR DIAGNOSA PENYAKIT IBU HAMIL</h1>
        <p class="lead">Sistem ini membantu mendiagnosa penyakit yang diderita ibu hamil.</p>
    </div>
</div>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{asset('assets/app/img/diagnosa.png')}}"  alt="..." class="img-fluid">
                        </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{route('diagnosa')}}">
                                    Diagnosa
                                </a>
                            </h5>
                        <p class="card-text">Mendiagnosa penyakit dengan 
                            memasukkan gejala yang dirasakan oleh
                            ibu hamil</p>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection