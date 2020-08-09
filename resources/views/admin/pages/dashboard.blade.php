@extends('admin.layouts.app')

@section('page', 'Dashboard')

@section('main')
    <div class="alert alert-success" role="alert">
        Selamat Datang <b>{{ \Auth::user()->name }}</b>.
    </div>
@endsection