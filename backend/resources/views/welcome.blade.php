<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100%;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>STUDY TECH</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        
    </head>
    <body class="antialiased" style="height: 100%; background-image: url(image/background.jpg);background-size: cover;">
        <div class="container"  style="height: 100%; margin-bottom: -70px;">
            <div class="title mx-auto border rounded" style="width: 400px; transform: translateY(50%); background-color:rgba(255,255,255,0.4);">
                <img src="image/logo.png" class="text-center">
                <p class="text-center">エンジニア特化型の学習管理アプリ</p>

                @if (Route::has('login'))
                <div class="text-center" style="margin: 20px 20px 20px 20px;">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline"><button class='btn btn-primary w-75'>Home</button></a>
                    @else
                        <a href="{{ route('login') }}" class="text-right"><button class='btn btn-primary w-75' style="margin: 20px auto">ログイン</button></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-right"><button class='btn btn-primary w-75'>新規登録</button></a>
                        @endif
                    @endif
                </div>
            @endif
            </div>


            
        </div>
        <footer class="d-flex align-items-center justify-content-center" style="background-color: #3E3E3E; height: 70px;">
            <span style="color: white;">COPYRIGHT@KOTA ESAKI</span>
        </footer>
        
    </body>
</html>
