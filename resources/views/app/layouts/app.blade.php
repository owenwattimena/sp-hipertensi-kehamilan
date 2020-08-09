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

    <title>Sistem Pakar Diagnosa Penyakit Ibu Hamil</title>
    @yield('style')
</head>

<body>

    <!-- As a heading -->
    <nav class="navbar navbar-light bg-pink">
        <div class="container">
            <span class="navbar-brand mb-0 h1 text-light">
                Sistem Pakar
                <small class="d-block">Diagnosa Penyakit Ibu Hamil</small>
            </span>
        </div>
    </nav>

    <div class="row">
        <div class="col-md-12">
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