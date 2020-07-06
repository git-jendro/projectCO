<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --}}
    {{-- <script>
        $(document).ready(function(){
            $(".input").click(function(){
                $(".input-group").slideToggle();
            });
        });
    </script> --}}
    
    <script>
        $(document).ready(function() {
        var $par = $('div.comments');
        $par.hide();

        //use comm as a class value since you want to group multiple elements
        $('.comm').click(function(e) {
            var $comm = $(this).siblings('.comments').slideToggle('slow');
            //if you want to hide previously opened comment when a new one is clicked
            $par.not($comm).slideUp('slow');
            e.preventDefault();
        });
        });
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar sticky-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 bg-white shadow-sm position-fixed pt-4">
                    <div class="nav flex-column flex-nowrap vh-100 overflow-auto text-white align-content-center">
                        @if (Auth::user()->gender=='laki')
                            <img src="{{ asset('img/1.png') }}" class="avatar mb-3" alt="avatar">
                        @else
                            <img src="{{ asset('img/2.png') }}" class="avatar mb-3" alt="avatar">
                        @endif
                        <a href="#" class="nav-link">{{ Auth::user()->name }}</a>
                        <a href="#" class="nav-link">
                            Jumlah Update
                            <br>
                             {{$hitung->count()}}
                             
                        </a>
                    </div>
                </div>
                
                <div class="col offset-2" id="main">
                    @if (Auth::user()->status!="admin")
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3 border-bottom">
                        @yield('content')
                    </div>
                    @else
                        <div class="card-header">
                            Yu've log in as Admin {{Auth::user()->name}}
                        </div>                      
                    @endif
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                @yield('thread')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="page-footer font-small blue">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">
            © 2020 Copyright:
          <a href="https://github.com/git-jendro"> git-jendro</a>
        </div>
        <!-- Copyright -->
      
      </footer>
      <script>
        function myFunction() {
            var x = document.getElementById("child");

            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        </script>
</body>
</html>
