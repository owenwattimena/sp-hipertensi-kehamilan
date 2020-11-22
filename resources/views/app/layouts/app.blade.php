@php
$current_route = Route::currentRouteName();
@endphp
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    
    <link rel="stylesheet" href="{{ asset('assets/app/css/main.css') }}">
    
    <title>Sistem Pakar Diagnosa Hipertensi Ibu Hamil</title>
    @yield('style')
</head>

<body>
    
    <!-- As a heading -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fondamento" href="{{url('/')}}">
                <img src="{{asset('assets/app/img/sph-icon.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                SPH Bumil
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fondamento" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link {{\Route::current()->getName() == "home" ? "active" : ""}}" aria-current="page" href="{{route('home')}}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{\Route::current()->getName() == "diagnosa" ? "active" : ""}}" href="{{route('diagnosa')}}">Konsultasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{\Route::current()->getName() == "informasi" ? "active" : ""}}" href="{{route('informasi')}}">Informasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="row mt-4">
        <div class="col-md-12 mt-3">
            @yield('main')
        </div>
    </div>
    
    
    <!-- Optional JavaScript -->
    
    <!-- Popper.js first, then Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    
    
    @yield('script')
</body>

</html>