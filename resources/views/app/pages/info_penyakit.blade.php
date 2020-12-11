@extends('app.layouts.app')

@section('main')
<div class="jumbotron jumbotron-fluid mb-0 pt-5" style="background-color: #FBFBFB">
  <div class="pb-3">
    <div class="row">
      <div class="col-3">
        <h4 class="text-center ">HIPERTENSI KEHAMILAN</h4>
        <P class="text-center fondamento">Kenali gejalanya, kenali penyakitnya</P>
        <div class="list-group" id="list-tab" role="tablist">
          @foreach ($penyakit as $item)
          
          <a class="list-group-item list-group-item-action mb-3 {{($loop->first) ? 'active' : ''}}" id="list-{{$item->kode}}-list" data-toggle="list" href="#list-{{$item->kode}}" role="tab" aria-controls="{{$item->kode}}">
            <img src="{{asset('assets/app/img/unnamed.png')}}" width="40" height="40" class="d-inline-block align-top" alt="">
            {{$item->nama}}
          </a>
          @endforeach

        </div>
      </div>
      <div class="col-9">
        <div class="container">
          <div class="tab-content" id="nav-tabContent">
            
            @foreach ($penyakit as $item)
            <div class="tab-pane fade show {{($loop->first) ? 'active' : ''}}" id="list-{{$item->kode}}" role="tabpanel" aria-labelledby="list-{{$item->kode}}-list">
              <div class="accordion accordion-flush" id="accordionFlushExample">
                
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Definisi
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      {!!$item->definisi!!}
                    </div>
                  </div>
                </div>
                
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      Gejala
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      {!!$item->gejala!!}
                    </div>
                  </div>
                </div>
                
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      Pencegahan
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      {!!$item->pencegahan!!}
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection