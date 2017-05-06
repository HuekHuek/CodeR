<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">
                        <i class="fa fa-play-circle"></i> My Page
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                @if (Route::has('login'))
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        @if (Auth::check())
                        <li>
                            <a href="{{ url('/home') }}">Home</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ url('/login') }}">Login</a>
                        </li>
                        <li>
                            <a href="{{ url('/register') }}">Register</a>
                        </li>
                        @endif
                    </ul>
                </div>
                @endif
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Intro Header -->
        <header class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="brand-heading">My Page</h1>
                            <p class="intro-text">What the Heck is this!
                                <br>Created by The GhouL.</p>
                            <a href="{{ url('/login') }}"><button class="btn btn-default">Login as User1</button></a>
                            <a href="{{ url('/admin') }}"><button class="btn btn-default">Login as User2</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    </body>

    <footer>
        <script src="{{ asset('js/app.js') }}"></script>
    </footer>
</html>
