@extends('auth.layouts.auth')

@section('title', 'Register')

@section('main')
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up Mahasiswa</h2>
                    <form method="POST" action="{{ route('mahaRegist.post') }}" class="register-form" id="register-form">
                        @csrf
                        <div class="form-group">
                            <label for="nama"><i class="zmdi zmdi-account"></i></label>
                            <input type="text" name="nama" id="nama" placeholder="Your Name *" required />
                        </div>
                        <div class="form-group">
                            <label for="npm"><i class="zmdi zmdi-pin-account"></i></label>
                            <input type="text" name="npm" id="npm" placeholder="NPM *" required />
                        </div>
                        <div class="form-group">
                            <label for="jurusan"><i class="zmdi zmdi-airline-seat-legroom-reduced"></i></label>
                            <input type="text" name="jurusan" id="jurusan" placeholder="Jurusan *" required />
                        </div>
                        <div class="form-group">
                            <label for="semester"><i class="zmdi zmdi-assignment"></i></label>
                            <input type="number" name="semester" id="semester" placeholder="Semester *" required />
                        </div>
                        <div class="form-group">
                            <label for="no_telp"><i class="zmdi zmdi-phone"></i></label>
                            <input type="number" name="no_telp" id="no_telp" placeholder="No. Telp" required />
                        </div>
                        <div class="form-group">
                            <label for="alamat"><i class="zmdi zmdi-pin"></i></label>
                            <input type="text" name="alamat" id="alamat" placeholder="Alamat" required />
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email *" required />
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Password *" required />
                        </div>
                        <div class="form-group">
                            <label for="re_pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password *" required />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{ asset('auth/images/signup-image.jpg') }}" alt="sing up image"></figure>
                    <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('register-form').addEventListener('submit', function(e) {
            var password = document.getElementById('pass').value;
            var rePass = document.getElementById('re_pass').value;

            if (password !== rePass) {
                e.preventDefault();
                alert("Passwords do not match.");
            }
        });
    </script>
@endsection
