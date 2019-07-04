<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lalezar&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Lalezar', cursive;
        }

        p {
            font-family: 'Abel', sans-serif;
            font-size: 1.8rem;
        }

        html {
            font-size: 62.5%;
        }

        body {
            font-size: 18px;
        }

        h1 {
            font-size: 6.6rem !important;
            margin: 0px;
            padding: 0px;
        }

        h2 {
            font-size: 5.2rem;
        }

        h3 {
            font-size: 2.4rem;
        }

        a {
            font-size: 1.6rem;
        }

        .carousel-caption h2 {
            color: #178B93;
        }

        .header {
            display: flex;
            justify-content: space-between;
            padding-top: 2.0rem;
        }

        .logo-green {
            color: #4CCC60;
        }

        .logo-blue {
            color: #178B93;
        }

        .fa-facebook-square {
            color: #178B93;
        }

        .carousel-item img {
            width: auto;
            height: 500px;
            max-height: 500px;
        }

        .carousel-indicators li {
            background-color: #178B93;
        }

        .carousel-caption {
            bottom: 37%;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 1.6rem;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            font-family: 'Abel', sans-serif;
            ;
        }

        .m-b-md {
            margin-bottom: 30px;
        }


        .contenus {
            flex-wrap: wrap;
            justify-content: space-evenly;
            margin-bottom: 10%;
            display: none;
            color: white;
            padding-top: 10%;
            padding-bottom: 15%;
            position: relative;
        }

        .tab-link-1 {
            background-color: #4CCC60;
        }

        .tab-link-2 {
            background-color: #178B93;
        }

        .contenus.current {
            display: flex;
            background-color: #4CCC60;
        }

        .contenus-2.current {
            background-color: #178B93;
        }

        .menu {
            display: flex;
            justify-content: space-between;
        }

        .descr-logo {
            display: block;
            color: #fff;
            width: auto;
        }

        .tab-link-1:hover {
            background-color: #81db8f;
        }

        .tab-link-2:hover {
            background-color: #5cadb3;
        }

        .tab-link {
            display: flex;
            justify-content: center;
            width: 30%;
            height: 80px;
            cursor: pointer;
            border: none;
        }

        button:focus {
            outline: none;
        }

        .circle {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            background-color: white;
            position: relative;
            margin: 0 auto;
        }

        .circle img {
            width: 130px;
            height: 130px;
            position: absolute;
            top: 35px;
            left: 40px;
        }

        .img-worker {
            left: 35px !important;
        }

        .img-avatar {
            left: 35px !important;
        }

        .img-account {
            top: 45px !important;
        }

        .infos-client-1,
        .infos-client-2,
        .infos-client-3 {
            display: flex;
            flex-direction: column;
        }

        .infos h3,
        .infos p {
            margin-top: 15px;
            text-align: center;
        }

        .footer {
            background-color: rgba(12, 12, 12, 0.5);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 30px;
            display: flex;
            justify-content: center;
            text-align: center;
        }

        .footer a {
            padding: 10px 70px;
            border: 2px solid #4CCC60;
            background-color: white;
            text-decoration: none;
            color: #505050;
        }

        .footer a:hover {
            background-color: #4CCC60;
            color: white;
        }

        .btn-blue a {
            border: 2px solid #178B93 !important;
        }

        .btn-blue {
            display: flex;
            justify-content: space-around;
        }

        .btn-blue a:hover {
            background-color: #178B93 !important;
        }

        @media screen and (max-width:600px) {
            .carousel-caption h2 {
                font-size: 2.6rem;
            }
           .descr-logo{
             font-size:1.6rem;
           }
        }


    </style>
</head>

<body>
    <div>
        @if (Route::has('login'))
        <div id="header">
            <div class="container">
                <div class="header">
                    <h1><span class="logo-green">jobs</span><span class="logo-blue">.jr</span></h1>
                    <div class="links">
                        @auth
                        <a href="{{ url('/home') }}">Home</a>
                        @else
                        <a href="{{ route('login') }}">Se connecter</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}">S'inscrire</a>
                        @endif
                        @endauth
                        <a href="https://www.facebook.com/" target="_blank"><i
                                class="fab fa-facebook-square fa-2x"></i></a>
                    </div>
                </div><!-- header -->
            </div><!-- container -->
        </div><!-- header -->
        @endif
        <div class="carousel">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/gardiennage-3.jpg') }}" class="d-block w-100 img-responsive"
                            alt="gardiennage">
                        <div class="carousel-caption d-md-block">
                            <h2>Service de gardiennage</h2>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/deneigement-2.jpg') }}" class="d-block w-100 img-responsive"
                            alt="déneigement">
                        <div class="carousel-caption d-md-block">
                            <h2>Service de déneigement</h2>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/entretient-paysager.jpg') }}" class="d-block w-100 img-responsive"
                            alt="entretient-paysager">
                        <div class="carousel-caption d-md-block">
                            <h2>Service d'entretient-paysager</h2>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/peinture-2.jpg') }}" class="d-block w-100 img-responsive"
                            alt="peinture">
                        <div class="carousel-caption d-md-block">
                            <h2>Service de peinture</h2>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <section id="menu" class="txt-center-tablet">
            <div class="menu">
                <button data-activate="tab1" class="tab-link tab-link-1 current col-6">
                    <h3 class="descr-logo">Service pour client</h3>
                </button>
                <button data-activate="tab2" class="tab-link tab-link-2 col-6">
                    <h3 class="descr-logo">Service pour entrepreneur</h3>
                </button>
            </div>
            <!--Menu Burger -->
            <div id="tab1" class="contenus contenus-1 current txt-center-mobile">
                <div class="infos-client-1 infos col-sm-12 col-lg-3">
                    <span class="circle"><img src="{{ asset('img/clipboard.svg') }}" alt="formulaire" /></span>
   
                        <h3>Étape 1 :</h3>
                        <p>Entrée des informations pour le service</p>
             
                </div>
                <div class="infos-client-2 infos col-sm-12 col-lg-3">
                    <span class="circle"><img src="{{ asset('img/worker.svg') }}" alt="entrepreneur"
                            class="img-worker" /></span>
                   
                        <h3>Étape 2 :</h3>
                        <p>Choissiser l’entrepreneur junior qui vous convient le plus</p>
               
                </div>
                <div class="infos-client-3 infos col-sm-12 col-lg-3">
                    <span class="circle"><img src="{{ asset('img/checked.svg') }}" alt="cocher" /></span>
                        <h3>Étape 3 :</h3>
                        <p>Faire une soumission</p>
                </div>
                <div class="footer btn-green">
                    <a href="#">Faire une recherche</a>
                </div>
            </div>
            <!--Menu Tacos-->
            <div id="tab2" class="contenus contenus-2 txt-center-mobile">
                <div class="infos-client-1 infos col-sm-12 col-lg-3">
                    <span class="circle"><img src="{{ asset('img/avatar.svg') }}" alt="avatar"
                            class="img-avatar" /></span>
                        <h3>Étape 1 :</h3>
                        <p>Créer votre compte d’entrepreneur junior</p>
                </div>
                <div class="infos-client-2 infos col-sm-12 col-lg-3">
                    <span class="circle"><img src="{{ asset('img/account.svg') }}" alt="account"
                            class="img-account" /></span>
                        <h3>Étape 2 :</h3>
                        <p>Connectez-vous pour voir votre profil</p>
                </div>
                <div class="footer btn-blue">
                    <a href="#">S'inscrire</a>
                    <a href="#">Se connecter</a>
                </div>
            </div>
        </section>




    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="js/app.js"></script>
</body>

</html>
