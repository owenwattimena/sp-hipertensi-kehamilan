@extends('app.layouts.app')

@section('main')
<div class="jumbotron jumbotron-fluid mb-0 pt-5" style="background-color: #FBFBFB">
    <div class="container pb-3">
        <h1 class="text-center ">HIPERTENSI KEHAMILAN</h1>
        <P class="text-center fondamento">Kenali gejalanya, kenali penyakitnya</P>
        <div class="row">
            <div class="col-4">
                <div class="list-group" id="list-tab" role="tablist">
                    @foreach ($penyakit as $item)
                        
                    <a class="list-group-item list-group-item-action mb-3 {{($loop->first) ? 'active' : ''}}" id="list-home-list" data-toggle="list" href="#list-{{$item->kode}}" role="tab" aria-controls="home">
                        <img src="{{asset('assets/app/img/unnamed.png')}}" width="40" height="40" class="d-inline-block align-top" alt="">
                        {{$item->nama}}</a>
                    @endforeach
                    {{-- <a class="list-group-item list-group-item-action mb-3" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                        <img src="{{asset('assets/app/img/unnamed.png')}}" width="40" height="40" class="d-inline-block align-top" alt="">
                        Profile</a>
                    <a class="list-group-item list-group-item-action mb-3" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">
                        <img src="{{asset('assets/app/img/unnamed.png')}}" width="40" height="40" class="d-inline-block align-top" alt="">
                        Messages</a> --}}
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">
                    @foreach ($penyakit as $item)
                        <div class="tab-pane fade show active" id="list-{{$item->kode}}" role="tabpanel" aria-labelledby="list-home-list">
                            <h2>Definisi</h2>
                            {!!$item->definisi!!}
                            <h2>Gejala</h2>
                            {!!$item->gejala!!}
                            <h2>Pencegahan</h2>
                            {!!$item->pencegahan!!}
                            <h2>Pengobatan</h2>
                            {!!$item->pengobatan!!}
                        </div>
                    @endforeach
                    {{-- <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection