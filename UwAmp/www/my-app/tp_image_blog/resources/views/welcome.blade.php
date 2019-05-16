@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <h1>Imagerie Laravel</h1>
    </div>

    @auth
    <div>
    <!-- Message de confirmation de connexion -->
        <div class="font-weight-bold"> 
            Vous êtes connecté.
        </div>
    </div>
    @endauth

    <!-- Permet l'affichage des photos à partir de variables qui se réfèrent au image controller. -->
    <div class="row">
        @foreach ($photos as $photo)
        <div class="col-xl-4 col-lg-4 col-md-12 col-12">
            <div class="card" style="width: 18rem;">
                <a href="/storage/images/{{ $photo->name }}"><img src="/storage/thumbs/{{ $photo->name }}"
                        class="card-img-top" style="height: 250px;"></a>
                <div class="card-body">
                    <h5 class="card-title">Location: {{$photo->city}}</h5>
                    <h5 class="card-title">Utilisateur: {{$photo->utilisateur}} </h5>
                    @auth
                    <form action="{{ url('signalement/'.$photo->id) }}" method="GET">
                        <button type="submit" class="btn btn-danger">Signaler</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif


    <script type="text/javascript">
        // Va chercher grâce à J Query une chaine de données à partir de l'interface textuelle et suggère des lieux exclusivement entrées dans la base de données (le même que dans app.blade). 
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



    @endsection

