@extends('admin.layouts.app')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" integrity="sha512-pDpLmYKym2pnF0DNYDKxRnOk1wkM9fISpSOjt8kWFKQeDmBTjSnBZhTd41tXwh8+bRMoSaFsRnznZUiH9i3pxA==" crossorigin="anonymous" />
@endsection

@section('page', 'Penyakit ')

@section('main')
<div>
    <span>Ubah Penyakit</span>
    <form id="form" action="{{route('update_penyakit', $penyakit->kode)}}" method="POST" class="needs-validation" novalidate>
        @method('put')
        @csrf
        <div class="modal-body clearfix">
            <div class="col-md-12 mb-3">
                <label for="kode">Kode Penyakit</label>
                <input type="text" class="form-control" id="kode" name="kode" value="{{$penyakit->kode}}" placeholder="Kode Penyakit" required readonly>
                <div class="invalid-feedback">
                  Tidak boleh kosong.
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="nama">Penyakit</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{$penyakit->nama}}" placeholder="Penyakit" required>
                <div class="invalid-feedback">
                  Tidak boleh kosong.
                </div>
            </div>
            <div class="col-md-12 mb-3">
              <label for="definisi">Definisi</label>
              <textarea class="form-control textarea" id="definisi" name="definisi" rows="3" required>{{$penyakit->definisi}}</textarea>
              <div class="invalid-feedback">
                  Tidak boleh kosong.
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <label for="gejala">Gejala</label>
              <textarea class="form-control textarea" id="gejala" name="gejala" rows="3" required>{{$penyakit->gejala}}</textarea>
              <div class="invalid-feedback">
                  Tidak boleh kosong.
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <label for="pencegahan">Pencegahan</label>
              <textarea class="form-control textarea" id="pencegahan" name="pencegahan" rows="3" required>{{$penyakit->pencegahan}}</textarea>
              <div class="invalid-feedback">
                  Tidak boleh kosong.
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <label for="pengobatan">Pengobatan</label>
              <textarea class="form-control textarea" id="pengobatan" name="pengobatan" rows="3" required>{{$penyakit->pengobatan}}</textarea>
              <div class="invalid-feedback">
                  Tidak boleh kosong.
              </div>
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-primary mr-2">Save changes</button>
            </div>
        </div>
    </form>
</div>
    
@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js" integrity="sha512-+cXPhsJzyjNGFm5zE+KPEX4Vr/1AbqCUuzAS8Cy5AfLEWm9+UI9OySleqLiSQOQ5Oa2UrzaeAOijhvV/M4apyQ==" crossorigin="anonymous"></script>
    <script>
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
        $(function () {
        // Summernote
        $('.textarea').summernote()
    })
    </script>
@endsection