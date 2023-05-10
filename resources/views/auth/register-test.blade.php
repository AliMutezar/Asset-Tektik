<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ url('img/logos/tektik.png') }}">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('css/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ url('css/nucleo-svg.css') }}">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" id="pagestyle" href="{{ url('css/argon-dashboard.css?v=2.0.4') }}">
</head>

<body class="">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                        <p class="text-lead text-white">
                            Use these awesome forms to login or create new account on the <strong>Tektik Asset Management</strong> website .
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Register Accont</h5>
                        </div>
                        
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-3">
                                    <input type="text"
                                        class="form-control @error('name') is-invalid @elseif(!empty(old('name'))) is-valid @enderror"
                                        name="name" placeholder="Your Name" aria-label="Name" value="{{ old('name') }}"
                                        required autofocus>

                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @elseif(!empty(old('email'))) is-valid @enderror"
                                        placeholder="Email" aria-label="Email" name="email" value="{{ old('email') }}"
                                        required autofocus>

                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @elseif(!empty(old('password'))) is-valid @enderror"
                                        name="password" placeholder="Password" aria-label="Password" required>

                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @elseif(!empty(old('password'))) is-valid @enderror"
                                        name="password_confirmation" placeholder="Confirm Password" aria-label="Password" required>

                                    @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Already have an account? 
                                    <a href="{{ route('login') }}" class="text-dark font-weight-bolder">Sign in</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ url('js/core/popper.min.js') }}"></script>
    <script src="{{ url('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <script src="{{ url('js/argon-dashboard.min.js?v=2.0.4') }}"></script>
</body>

</html>