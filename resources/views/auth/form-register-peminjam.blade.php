<html>

<head>
    <title>Form register</title>
    <!-- Latest compiled and minified CSS -->
    <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet">

    <!-- Optional theme -->
    <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
        integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #516BEB;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold " href="#" style="color: #fff">
                Form Register
            </a>

        </div>
    </nav>
    <div class="container">
        {{-- nav --}}

        <section class="container">
            <div class="container-page">
                <div class="col-md-6">
                    <h3 class="dark-grey">Registration</h3>

                    <form action="{{ url('users-used/register') }}" method="post">
                        @csrf
                        <div class="form-group col-lg-12 mb-3">
                            <label for="name">Nama</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" required type="text" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 mb-3">
                            <label for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" required type="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 mb-3">
                            <label for="password">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" id="password"
                                name="password" required type="password" value="">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 mb-3">
                            <button class="btn btn-primary" type="submit">Register</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <p>Bagi anda yang ingin meminjam alat musik silahkan registrasi akun dan login.</p>
                    <p>di dalam portal admin akan tersedia form peminjaman dan melenkapi data dari</p>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
