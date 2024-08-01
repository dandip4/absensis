<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Adminto - Responsive Bootstrap 4 Landing Page Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('Adminto_v5.2.0/Landing/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('Adminto_v5.2.0/Landing/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Adminto_v5.2.0/Landing/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Adminto_v5.2.0/Landing/css/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Adminto_v5.2.0/Landing/css/style.css') }}" />

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="58" class="scrollspy-example">

    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark bg-dark" id="nav-sticky">
        <div class="container-fluid">
            <a class="logo text-uppercase" href="{{ url('/') }}">
                <img src="{{ asset('Adminto_v5.2.0/Landing/images/logo-light.png') }}" alt="" class="logo-light" height="18" />
                <img src="{{ asset('Adminto_v5.2.0/Landing/images/logo-dark.png') }}" alt="" class="logo-dark" height="18" />
            </a>

            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button> --}}
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto" id="mySidenav">
                    <li class="nav-item">
                        <a href="{{route('mahasiswa.absensi.index')}}" class="nav-link active">Home</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <section class="section mt-5 mb-5" id="absensi">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="title text-center">
                        <h6 class="text-primary small-title">Absensi</h6>
                        <h4>Isi Absensi</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <form method="POST" action="{{ route('mahasiswa.absensi.store', [$absensi->mata_kuliah_id, $absensi->week_id]) }}">
                    @csrf
                    <div class="col-xl-12 col-sm-6">
                        <div class="services-box p-4 bg-white mt-4">
                            <div class="form-group">
                                <label for="status">Status Kehadiran:</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="hadir">Hadir</option>
                                    <option value="sakit">Sakit</option>
                                    <option value="izin">Izin</option>
                                    <option value="alpa">Alpha</option>
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer class="footer bg-dark" style="height: 350px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center">
                        <div class="footer-logo mb-3">
                            <img src="images/logo-light.png" alt="" height="20">
                        </div>
                        <ul class="list-inline footer-list text-center mt-5">
                            <li class="list-inline-item"><a href="#">Home</a></li>
                            <li class="list-inline-item"><a href="#">About</a></li>
                            <li class="list-inline-item"><a href="#">Services</a></li>
                            <li class="list-inline-item"><a href="#">Clients</a></li>
                            <li class="list-inline-item"><a href="#">Pricing</a></li>
                            <li class="list-inline-item"><a href="#">Contact</a></li>
                        </ul>
                        <ul class="list-inline social-links mb-4 mt-5">
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-google-plus"></i></a></li>
                        </ul>
                        <p class="text-white-50 mb-4">2016 - 2020 © Adminto. Design by <a href="#" target="_blank" class="text-white-50">Coderthemes</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="#" class="back-to-top" id="back-to-top"> <i class="mdi mdi-chevron-up"> </i> </a>
    <script src="{{ asset('Adminto_v5.2.0/Landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Adminto_v5.2.0/Landing/js/counter.int.js') }}"></script>
    <script src="{{ asset('Adminto_v5.2.0/Landing/js/app.js') }}"></script>
</body>
</html>
