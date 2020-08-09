@extends('app.layouts.app')

@section('main')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="bt-title text-primary">Login</h3>
                    @if(session('msg'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {!!session('msg')!!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-group pb-1 mt-5">
                            <div class="form-check pl-0">
                                <label for="username" class="bt-caption">Username</label>
                                <input type="text" class="rounded form-control form-control-lg" name="username" id="username"
                                    placeholder="Username" required>
                                <div class="invalid-feedback">
                                    Username tidak boleh kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check pl-0">
                                <label for="password" class="bt-caption">Password</label>
                                <input type="password" class="rounded form-control form-control-lg" name="password" id="password"
                                    placeholder="Password" required>
                                <div class="invalid-feedback">
                                    Password tidak boleh kosong
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-block bg-dark-purple rounded-0 btn-lg mt-5 text-white" type="submit">Login</button>
                    </form>
                    <a href="{{url('/')}}" class="d-block text-center mt-3 bt-caption">&#8592; BERANDA</a>
                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function () {
                            'use strict';
                            window.addEventListener('load', function () {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function (form) {
                                    form.addEventListener('submit', function (event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();
                    </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection