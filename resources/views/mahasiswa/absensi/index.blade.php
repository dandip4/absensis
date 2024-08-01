<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Adminto - Responsive Bootstrap 4 Landing Page Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style>
    .services-box {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.services-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}
</style>
    <link rel="shortcut icon" href="{{ asset('Adminto_v5.2.0/Landing/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('Adminto_v5.2.0/Landing/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Adminto_v5.2.0/Landing/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Adminto_v5.2.0/Landing/css/pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Adminto_v5.2.0/Landing/css/style.css') }}" />

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="58" class="scrollspy-example">
    @if(session('status'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('status') }}',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: true,
            });
        });
    </script>
@endif
@if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Info!',
                text: '{{ session('status') }}',
                timer: 2100,
                timerProgressBar: true,
                showConfirmButton: true,
            });
        });
    </script>
@endif
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark" id="nav-sticky">
        <div class="container-fluid">
            <a class="logo text-uppercase" href="{{ url('/') }}">
                <img src="{{ asset('Adminto_v5.2.0/Landing/images/logo-light.png') }}" alt="" class="logo-light" height="18" />
                <img src="{{ asset('Adminto_v5.2.0/Landing/images/logo-dark.png') }}" alt="" class="logo-dark" height="18" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto" id="mySidenav">
                    <li class="nav-item">
                        <a href="{{ url('#home') }}" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('#features') }}" class="nav-link">Features</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('#services') }}" class="nav-link">MataKuliah</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('#contact') }}" class="nav-link">Contact</a>
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

    <section class="bg-home bg-gradient" id="home">
        <div class="home-center">
            <div class="home-desc-center">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-6">
                            <div class="home-title">
                                <h5 class="mb-3 text-white-50">Temukan Aplikasi Absensi Hari Ini</h5>
                                <h2 class="mb-4 text-white">Selamat Datang di Aplikasi Absensi Mahasiswa Unpak</h2>
                                <p class="text-white-50 home-desc font-16 mb-5">Aplikasi Absensi Mahasiswa Unpak adalah solusi terbaik untuk manajemen absensi mahasiswa yang efektif. Dibangun dengan teknologi modern untuk kebutuhan perkuliahan Anda. </p>
                                @guest
                                <div class="watch-video mt-5">
                                    <a href="{{ route('login') }}" class="btn btn-custom me-4">Login <i class="mdi mdi-chevron-right ms-1"></i></a>
                                </div>
                                @endguest
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-1 col-sm-6">
                            <div class="home-img mo-mt-20">
                                <img src="{{ asset('Adminto_v5.2.0/Landing/images/home-img.png') }}" alt="" class="img-fluid mx-auto d-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="features" id="features">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills nav-justified features-tab mb-5 bg-white">
                        <li class="nav-item">
                            <a class="nav-link">
                                <div class="clearfix">
                                    <div class="features-icon float-end">
                                        <h1><i class="pe-7s-notebook"></i></h1>
                                    </div>
                                    <div class="d-none d-lg-block me-4">
                                        <h5 class="tab-title text-black">Fitur Aplikasi Absensi</h5>
                                        <p class="text-black">Temukan fitur-fitur unggulan yang kami tawarkan untuk manajemen absensi mahasiswa secara efektif dan efisien.</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="content">
                        <div class="">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-4 col-sm-6">
                                    <div>
                                        <img src="{{ asset('Adminto_v5.2.0/Landing/images/features-img/img-3.png') }}" alt="" class="img-fluid mx-auto d-block">
                                    </div>
                                </div>
                                <div class="col-lg-6 offset-lg-1">
                                    <div>
                                        <div class="feature-icon mb-4">
                                            <h1><i class="pe-7s-notebook text-primary"></i></h1>
                                        </div>
                                        <h5 class="mb-3"> Aplikasi Absensi</h5>
                                        <p class="text-muted">Kami menjamin setiap kode yang kami buat memiliki standar kualitas tinggi untuk memastikan keandalan dan kinerja optimal aplikasi.</p>
                                        <div class="row pt-2">
                                            <div class="col-lg-12">
                                                <div class="text-muted">
                                                    <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Memungkinkan mahasiswa untuk absen secara online dengan mudah dan cepat.</p>
                                                    <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Dosen dapat membuat absen sesuai matakuliahnya dan kelas yang diinginkan.</p>
                                                    <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Admin dapat membuat akun untuk mahasiswa dan dosen.</p>
                                                    <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Dosen dapat mengelola dan mendownload laporan kehadiran.</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mt-4">
                                            <a href="#" class="btn btn-custom">Pelajari Selengkapnya <i class="mdi mdi-arrow-right ms-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @auth
    <section class="section bg-light" id="services">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="title text-center">
                        <h6 class="text-primary small-title">Matakuliah</h6>
                        <h4>Cari Matakuliah Apa?</h4>
                        <p class="text-muted">Pilih Salah Satu Untuk Absen</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(isset($mataKuliahs) && $mataKuliahs->count() > 0)
                @foreach($mataKuliahs as $mataKuliah)
                <div class="col-xl-4 col-sm-6">
                    <a href="{{ route('mahasiswa.absensi.weeks', $mataKuliah->id) }}">
                    <div class="services-box p-4 bg-white mt-4">
                        <div class="services-img float-start me-4">
                            <img src="{{ asset('Adminto_v5.2.0/Landing/images/icons/paperdesk.png') }}" alt="">
                        </div>
                        <h5>{{ $mataKuliah->nama }}</h5>
                    </div>
                </a>
                </div>
                @endforeach
                @else
                <div class="col-xl-12 col-sm-6">
                    <p class="text-muted h3 text-center">Belum ada matakuliah tersedia.</p>
                </div>
                @endif
            </div>
        </div>
    </section>
    @endauth

    <section class="section" id="contact">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="title text-center mb-5">
                        <h6 class="text-primary small-title">Kontak</h6>
                        <h4>Ada Pertanyaan?</h4>
                        <p class="text-muted">Jika ada pertanyaan, jangan ragu untuk menghubungi kami.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="get-in-touch">
                        <h5>Hubungi Kami</h5>
                        <p class="text-muted mb-5">Jangan ragu untuk menghubungi kami</p>

                        <div class="mb-3">
                            <div class="get-touch-icon float-start me-3">
                                <h2><i class="pe-7s-mail text-primary"></i></h2>
                            </div>
                            <div class="overflow-hidden">
                                <h5 class="font-16 mb-0">Email</h5>
                                <p class="text-muted">danadipa.n@gmail.com</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="get-touch-icon float-start me-3">
                                <h2><i class="pe-7s-phone text-primary"></i></h2>
                            </div>
                            <div class="overflow-hidden">
                                <h5 class="font-16 mb-0">Telepon</h5>
                                <p class="text-muted">0895-0255-8010</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="get-touch-icon float-start me-3">
                                <h2> <i class="pe-7s-map-marker text-primary"></i></h2>
                            </div>
                            <div class="overflow-hidden">
                                <h5 class="font-16 mb-0">Alamat</h5>
                                <p class="text-muted">Universitas Pakuan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="custom-form bg-white">
                        <span id="error-msg"></span>
                        <form method="post" name="myForm" onsubmit="return validateForm()">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Masukkan nama Anda...">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Alamat Email</label>
                                        <input name="email" id="email" type="email" class="form-control" placeholder="Masukkan email Anda...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="subject" class="form-label">Subjek</label>
                                        <input name="subject" id="subject" type="text" class="form-control" placeholder="Masukkan subjek...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="comments" class="form-label">Pesan</label>
                                        <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Masukkan pesan Anda..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-end">
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-custom" value="Kirim Pesan" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer bg-dark">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <a href="#" class="back-to-top" id="back-to-top"> <i class="mdi mdi-chevron-up"> </i> </a>
    <script src="{{ asset('Adminto_v5.2.0/Landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Adminto_v5.2.0/Landing/js/counter.int.js') }}"></script>
    <script src="{{ asset('Adminto_v5.2.0/Landing/js/app.js') }}"></script>
</body>
</html>
