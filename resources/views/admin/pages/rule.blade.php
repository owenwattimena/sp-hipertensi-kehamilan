@extends('admin.layouts.app')

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

{{-- Select 2 --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

<style>
  .select2-selection{
    height: 55px;
  }
</style>
@endsection

@section('page', 'Rule')

@section('main')
@if (session('msg'))
<div class="alert {!! session('type') !!} alert-dismissible fade show" role="alert">
    {!! session('msg') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <div class="text-right mb-3">
                <button class="btn btn-primary btn-create rounded-0" data-toggle="modal" data-target="#exampleModal">TAMBAH</button>
            </div>
            
            <table id="table" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Penyakit</th>
                        <th scope="col">Gejala</th>
                        <th scope="col">Bobot Pakar</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 0;
                    @endphp
                    @foreach ($rules as $rule)   
                        {{-- @php
                            dd($rule->kode_gejala)
                        @endphp  --}}
                        <tr>
                          <th scope="row">{{++$no}}</th>
                            <td data-kp="{{$rule->kode_penyakit}}">{{$rule->penyakit->nama}}</td>
                            <td  data-kg="{{$rule->kode_gejala}}">{{$rule->gejala->nama}}</td>
                            <td>{{$rule->bobot_pakar}}</td>
                            <td>
                              <button data-id="{{$rule->id}}" onclick="edit({{$rule}})" class="btn btn-warning btn-edit rounded-0 btn-sm text-danger" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-edit"></i> EDIT</button>
                              <form class="d-inline" method="post" action="{{route('rule_delete', ['id' => $rule->id])}}">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Yakin inging menghapus data?')" class="btn btn-danger rounded-0 btn-sm"> <i class="fas fa-trash"></i> HAPUS</button>

                              </form>



                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form" action="{{route('rule_store')}}" method="post" class="needs-validation" novalidate>
        @csrf
        <input type="hidden" id="method" name="_method" value="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-12 mb-3">
              <div class="form-group">
                <label for="penyakit">Penyakit</label>
                <select class="select form-control" id="penyakit" name="penyakit" required style="font-size: ">
                  <option value="">Pilih Penyakit</option>
                  @foreach ($penyakit as $data)
                    <option id="{{$data->kode}}" value="{{$data->kode}}">{{$data->nama}}</option>
                  @endforeach
                </select>
                <small class="invalid-feedback">
                  Tidak boleh kosong.
                </small>
              </div>
            </div>
            <div class="col-12 mb-3">
              <div class="form-group">
                <label for="gejala">Gejala</label>
                <select class="select form-control form-control-lg" id="gejala" name="gejala" required>
                  <option value="">Pilih Penyakit</option>
                  @foreach ($gejala as $data)
                  <option id="{{$data->kode}}" value="{{$data->kode}}">{{$data->nama}}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                  Tidak boleh kosong.
                </div>
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <label for="bobot">Bobot Pakar</label>
              <input type="number" step="0.01" min="0.0" max="1.0" class="form-control" id="bobot" name="bobot" placeholder="Bobot Pakar" required>
              <div class="invalid-feedback">
                Tidak boleh kosong.
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
  
@endsection

@section('script')
<!-- DataTables -->
<script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
{{-- Select 2 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
  let select2_penyakit = $('#penyakit').select2({
    placeholder: 'Masukkan Penyakit',
  });

  let select2_gejala = $('#gejala').select2(
    {
      placeholder: 'Masukan Gejala',
    }
  );

  function edit(rule){
    select2_penyakit.val(rule.kode_penyakit).trigger('change');
    select2_gejala.val(rule.kode_gejala).trigger('change');

    // console.log(rule.kode_gejala);
    
    // $("#penyakit").val(kode_penyakit);
    // $("#penyakit").trigger('change');
    $('#bobot').val(rule.bobot_pakar);
    $('.modal-title').text('Edit Rule')
    $('#form').attr('action', `{{url('admin/rule/update')}}/${id}`);
    $('#method').val('put');
  }
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

$(document).ready(function () {  
  $('#table').DataTable();

  

  $('.select2-selection').css('height', '40px');
  $('.select2').css('display', 'block');

  $('.btn-create').click(function(){
    $('.modal-title').text('Tambah Rule');
    $('#form').attr('action', `{{route('rule_store')}}`);
    $('#method').val('post');
    select2_penyakit.val(null).trigger('change');
    select2_gejala.val(null).trigger('change');
    $('#bobot').val('');
  });

  

  // $('.btn-edit').click(function(){
  //   let id = $(this).data('id');
  //   console.log(id);
  //   $('.modal-title').text('Edit Rule')
  //   $('#form').attr('action', `{{url('admin/rule/update')}}/${id}`);
  //   $('#method').val('put');
  //   let parent = $(this).parent().parent().children();
  //   let kode_penyakit = parent[1].dataset.kp;
  //   let kode_gejala = parent[2].dataset.kg;
  //   select2_penyakit.val(kode_penyakit).trigger('change');
  //   select2_gejala.val(kode_gejala).trigger('change');
  //   $('#bobot').val(parent[3].textContent);
  // });
});

</script>
@endsection