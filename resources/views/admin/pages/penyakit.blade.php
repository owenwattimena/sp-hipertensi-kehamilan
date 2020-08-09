@extends('admin.layouts.app')

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('page', 'Penyakit')

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
                        <th scope="col">Kode Penyakit</th>
                        <th scope="col">Penyakit</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 0;
                    @endphp
                    @foreach ($penyakit as $data)    
                        <tr>
                            <th scope="row">{{++$no}}</th>
                            <td>{{$data->kode}}</td>
                            <td>{{$data->nama}}</td>
                            <td>
                              <button data-id="{{$data->id}}" class="btn btn-warning btn-edit rounded-0 btn-sm text-danger" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-edit"></i> EDIT</button>
                              <form class="d-inline" method="post" action="{{route('penyakit_delete', ['id' => $data->id])}}">
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
        <form id="form" action="{{route('penyakit_store')}}" method="post" class="needs-validation" novalidate>
            @csrf
            <input type="hidden" id="method" name="_method" value="post">
            <div class="modal-body">
                <div class="col-md-12 mb-3">
                    <label for="kode">Kode Penyakit</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="{{$kode_baru}}" placeholder="Kode Penyakit" required readonly>
                    <div class="invalid-feedback">
                      Tidak boleh kosong.
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="nama">Penyakit</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Penyakit" required>
                    <div class="invalid-feedback">
                      Tidak boleh kosong.
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
<script>
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

$('#table').DataTable();

$('.btn-create').click(function(){
  $('.modal-title').text('Tambah Gejala');
  $('#form').attr('action', `{{route('penyakit_store')}}`);
  $('#method').val('post');
  $('#kode').val(`{{$kode_baru}}`);
  $('#nama').val('');
});

$('.btn-edit').click(function(){
  let id = $(this).data('id');
  $('.modal-title').text('Edit Gejala')
  $('#method').val('put');
  $('#form').attr('action', `{{url('admin/penyakit/update')}}/${id}`);
  let parent = $(this).parent().parent().children();
  let kode = parent[1].textContent;
  $('#kode').val(kode);
  $('#nama').val(parent[2].textContent);
});

</script>
@endsection