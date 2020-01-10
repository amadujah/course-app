<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}"/>

    <title>@yield('title')</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="{{ ('public/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('public/css/custom-style.css') }}">
    <style>
        body {
            /*background-color:aliceblue;*/
            background: url('{{asset('public/images/background.jpg')}}');
            font-family: 'Libre Baskerville', serif;

        }

        #navigation {
            margin: 0;
            padding: 20px;

        }

        #navigation li {
            display: inline;
            float: right;
            font-size: 20px;
            text-shadow: 2px 2px 5px #0BC;

        }

        #onglet_navigation {
            /*background-image: url(argent.jpg);*/
            background-repeat: no-repeat;
            width: 100%;
            height: 50%;
            margin-left: 5%;
            margin-right: 5%;

        }

        /* Footer */

        footer {
            display: flex;
            padding-top: 25px;
        }

        footer p, footer ul {
            font-size: 0.8em;
        }

        footer h1 {
            font-size: 1.1em;
        }


        #tweet {
            padding-top: 50px;
            width: 50%;
            padding-left: 100px;
        }


        #mes_photos img {

            margin-right: 2px;
        }


        #mes_amis ul {
            padding-left: 2px;
        }

        #mes_amis a {
            text-decoration: none;
            color: #760001;
        }

        figure {
            position: relative;
            display: inline-block;
            overflow: hidden;
            margin: 0;
        }

        img, figcaption {
            transition: all .25s ease;
        }

        figcaption {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: .5em;
            background: #000;
            background: rgba(0, 0, 0, .75);
            color: #fff;
            opacity: 0;
        }

        figure:hover img {
            transform: scale(1.1);
        }

        figure:hover figcaption {
            opacity: 10;
        }


    </style>

</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('home')  }}">CourseApp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('home')  }}">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('courses')  }}">Mes Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('products')  }}">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('contact')  }}">Contactez-nous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('aide') }}">Aide</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a class="btn btn-outline-primary" href="{{ url('/login') }}">Se connecter</a></li>
                    <li><a class="btn btn-outline-primary" href="{{ url('/register') }}">S'inscrire</a></li>
                @else
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button"
                                data-toggle="dropdown"> {{ Auth::user()->name }}
                            <span class="caret"></span></button>


                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('profile.show', \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier())}}"
                                   title="accueil compte" class="dropdown-item">Accueil
                                    compte</a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                    Se deconnecter
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                @endif
            </ul>
        </div>
    </nav>
</header>
<div class="container">

    @yield('content')
</div>
<!-- Scripts -->
<script src="{{asset('public/js/custom.js')}}"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>
</html>
