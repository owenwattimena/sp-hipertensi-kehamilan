@extends('app.layouts.app')

@section('main')
<div class="jumbotron jumbotron-fluid mb-0" style="background-color: #FBFBFB">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-6 order-md-2 pb-5">
                <img class="mx-auto d-block main-icon" height="400" src="{{asset('assets/app/img/icon-bunda.png')}}" alt="Kulit Manusia">
            </div>
            <div class="col-md-6 order-md-1 pt-5">
                <h1 class="display-5 text-dark text-center text-md-left playball" style="text-shadow: none">Sistem Pakar Hipertensi Kehamilan</h1>
                <p class="lead text-center text-md-left indieflower text-muted" style="text-shadow: none">Hai Bunda, ayo periksa kesehatan<br>darah tinggi bunda</p>
                <div class="text-center text-md-left">
                    <a href="{!!route('diagnosa')!!}" class="btn btn-primary bg-blue-dark">KONSULTASI</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5 bg-white">
    <div class="card py-3 bg-blue border-0 shadow-sm text-center text-md-left">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <img class="w-100 mt-3" src="{{asset('assets/app/img/icon-bunda-light.png')}}" alt="">
                        </div>
                        <div class="col-md-9 text-white">
                            <h6>Analisa Masalah</h6>
                            <p class="mb-0">
                                Hampir 70-80% ibu hamil di seluruh dunia mengalami tekanan darah tinggi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <img class="w-100 mt-3" src="{{asset('assets/app/img/icon-bunda-light.png')}}" alt="">
                        </div>
                        <div class="col-md-9 text-white">
                            <h6>Analisa Masalah</h6>
                            <p class="mb-0">
                                Hampir 70-80% ibu hamil di seluruh dunia mengalami tekanan darah tinggi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <img class="w-100 mt-3" src="{{asset('assets/app/img/icon-bunda-light.png')}}" alt="">
                        </div>
                        <div class="col-md-9 text-white">
                            <h6>Analisa Masalah</h6>
                            <p class="mb-0">
                                Hampir 70-80% ibu hamil di seluruh dunia mengalami tekanan darah tinggi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection