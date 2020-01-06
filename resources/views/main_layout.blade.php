<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}" />

    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>
    <link rel="shortcut icon" href="{{ ('public/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('public/css/custom-style.css') }}">
    <style>
        body {
            /*background-color:aliceblue;*/
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

    <script>

        /**
         * @return {boolean}
         */
        function ConfirmDelete() {
            return confirm("Voulez-vous vraiment supprimer ce produit?");
        }
    </script>
</head>
<body>
<header>
    <div style="background-color:black; color:white;font-size: large;font-family: fantasy;">
        <div>
            <div class="container">
                <a id="logo" href="{{ url('home')  }}" class="navbar-brand"
                   style="color: white; font-size: large;font-family: fantasy; ">Course App</a>


            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->


                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" style="background-color:black;">
                    <ul class="nav navbar-nav" id="navigation">
                        <li><a href="{{ url('aide') }}" title="Aide">Aide</a></li>
                        <li><a href="{{ url('contact') }}" title="Nous contacter">Nous contacter </a></li>
                        <li><a href="{{ url('products') }}">Produits</a></li>
                        <li><a href="{{ url('courses')  }}">Mes Courses</a></li>
                        <li><a href="{{ route('home')  }}">Accueil</a></li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Se connecter</a></li>
                            <li><a href="{{ url('/register') }}">S'inscrire</a></li>
                        @else


                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button"
                                        data-toggle="dropdown"> {{ Auth::user()->name }}
                                    <span class="caret"></span></button>


                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('profile')}}" title="accueil compte">Accueil compte</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                        </a>


                                        <a href="{{ url('/logout') }}"
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

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</header>
<div class="container">

    @yield('content')
</div>
<!-- Scripts -->
<script src="/js/app.js"></script>
<script type="text/javascript">
    $('#search').on('keyup', function () {
        console.log('search');
        var $form = $('.mForm');
        $value = $(this).val();
        url = $form.attr('action');
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            data: {'search': $value},
            success: function (data) {
                console.log('data ' + data);
            },
            error: function (err) {
                console.log(err);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});
</script>
</body>
</html>
