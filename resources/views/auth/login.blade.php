<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SMK Negeri 1 Pulau Rakyat | Login</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="shortcut icon" href="{{asset('assets/default.png')}}">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                width: 450px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body style="background-image: url({{asset('assets/login-bg.jpg')}});background-size: cover;background-repeat: no-repeat;">
        <div class="flex-center position-ref full-height">
            <div class="content" style="background-color: rgba(255,255,255,.7);padding: 30px;">
                <center>
                <!-- <img src="{{asset('assets/z-techno.png')}}">
                <h2>e-School Login</h2> -->
                <img src="{{asset('assets/default.png')}}" width="150px">
                <h2>SMK Negeri 1 Pulau Rakyat</h2>
                </center>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal z-login-form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <input id="email" type="email" class="z-techno-el form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-Mail" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input id="password" type="password" class="z-techno-el form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <!--
                                <div class="form-group">
                                    <center>
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                    </center>
                                </div>
                            -->

                                <div class="form-group">
                                    <button type="submit" class="btn z-techno-btn z-techno-primary btn-block z-techno-login-btn">
                                        <i class="fa fa-sign-in"></i> Login
                                    </button>
                                    <center>
                                        <p></p>
                                        Belum punya akun ? Silahkan Daftar <a href="{{ url('/register') }}">disini</a>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
