<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Imagerie Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>

<body>

    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Imagerie Laravel
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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

                        <form method="get" action="/search">
                            <input type="text" name="search" id="search" class="typeahead "
                                placeholder="Entrez une localisation" autocomplete="off" />
                            <button type="submit" class="btn btn-primary">Chercher</button>
                        </form>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li>
                            <form method="get" action="/search">
                                <input type="text" name="search" id="search" class="typeahead"
                                    placeholder="Entrez une localisation" autocomplete="off" />
                                <button type="submit" class="btn btn-primary">Chercher</button>
                                <!-- La classe typehead permet d'identtifiant dans le sciprt JavaScript à l'autocomplétion -->
                            </form>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('addimage') }}">{{ __('Mettre des images') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('addlocation') }}">{{ __('Ajouter une localisation') }}</a>
                        </li>
                   

                        <a class=" nav-link" href="{{ url('mesphotos/Auth::user()->id') }}">{{ __('Mes photos') }}</a>
                        
                
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            




                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                

                                <a class="dropdown-item"  href="{{ url('user/Auth::user()->id') }}">{{ __('Mon profil') }}</a>

                                @if (Auth::user()->level=='admin')
                        <a class="dropdown-item" href="{{ url('admin/Auth::user()->id') }}">{{ __('Espace administrateur') }}</a>
                        @endif

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            @yield('content')
        </main>
    </div>



    <script type="text/javascript">
        /*Le script ici sert l'autocomplétion. Adaptation de ce code: https://itsolutionstuff.com/post/ajax-autocomplete-textbox-in-laravel-58-exampleexample.html?fbclid=IwAR2O1xTzAZHOCetnqSdqNg8pJW6FlnJ-h1yGalziwEadtfYLsCNtpGlcOTc.*/
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source: function (query, process) {
                return $.get(path, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });

    </script>

</body>

</html>
