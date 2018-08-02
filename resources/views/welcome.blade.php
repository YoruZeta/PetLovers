<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pet Lovers</title>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

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
                text-align: center;
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
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>

                    @else
                        <a href="{{ url('/login') }}">Ingresar</a>
                        <a href="{{ url('/register') }}">Registrarse</a>
                    @endif
                </div>
            @endif

            <div><div>

            <div class="content">
                <h1>
                    Pet Lovers
                </h1>
                <center>
                  <img src="http://1.bp.blogspot.com/-4kLiRHgRUu8/Vl8_gKt48bI/AAAAAAAAANo/6BOKIdY9y6o/s1600/Logo1.png" width="350" height="350">
                  <h3>
                    Pet lovers es una aplicación web del tipo red social</h3><h3>
                    para estimularlos vínculos afectivos entre mascotas y dueños.
                  </h3>
                  <h2>
                    ¡Registrate ya!
                  </h2>
                </center>
            </div>
        </div>
    </body>
</html>
