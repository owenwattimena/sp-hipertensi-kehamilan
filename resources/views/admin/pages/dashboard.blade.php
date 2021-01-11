@extends('admin.layouts.app')

@section('page', 'Dashboard')

@section('main')
    <div class="alert alert-success" role="alert">
        Selamat Datang <b>{{ \Auth::user()->name }}</b>.
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                <h3>{{ count($penyakit) }}</h3>

                <p>Jumlah Penyakit</p>
                </div>
                <div class="icon">
                <i class="ion ion-medkit"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                <h3>{{ count($gejala) }}</h3>

                <p>Jumlah Gejala</p>
                </div>
                <div class="icon">
                <i class="ion ion-bug"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection