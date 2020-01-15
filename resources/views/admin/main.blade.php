<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <link rel="shortcut icon" href="{{ ('public/favicon.ico') }}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Gestion des courses - admin page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/css/custom-style.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
<header>
    <nav class="navbar  navbar-expand-md navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('home')  }}">CourseApp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
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
<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="#">Course App</a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-info">
          <span class="user-name">{{ \Illuminate\Support\Facades\Auth::user()->name }}
          </span>
                    <span class="user-role">Administrator</span>
                    <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
                </div>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-search">
                <div>
                    <div class="input-group">
                        <input type="text" class="form-control search-menu" placeholder="Search...">
                        <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar-search  -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>General</span>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="{{ url('profile') }}">
                            <i class="fa fas fa-users"></i>
                            <span>Gestion des utilisateurs</span>
                        </a>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="{{ url('products') }}">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Gestion des produits</span>
                        </a>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="{{ url('courses') }}">
                            <i class="fa fas fa-shopping-basket"></i>
                            <span>Gestion des courses</span>
                        </a>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-globe"></i>
                            <span>Maps</span>
                        </a>

                    </li>
                    <li class="header-menu">
                        <span>Extra</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Documentation</span>
                            <span class="badge badge-pill badge-primary">Beta</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-calendar"></i>
                            <span>Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>Examples</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
            <a href="#">
                <i class="fa fa-bell"></i>
                <span class="badge badge-pill badge-warning notification"></span>
            </a>
            <a href="{{route('messages.index')}}">
                <i class="fa fa-envelope"></i>
                <span class="badge badge-pill badge-success notification">
                    @if(isset($messagesCount))
                        {{ $messagesCount }}
                    @elseif(isset($messages))
                        {{count($messages)}}
                    @else
                        0
                    @endif
                </span>
            </a>
            <a href="#">
                <i class="fa fa-cog"></i>
                <span class="badge-sonar"></span>
            </a>
            <a href="#">
                <i class="fa fa-power-off"></i>
            </a>
        </div>
    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
    <!-- page-content" -->


</div>
<!-- page-wrapper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="{{ asset('public/js/custom.js') }}"></script>

</body>
</html>