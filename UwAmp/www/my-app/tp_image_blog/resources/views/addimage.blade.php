@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mettre des images') }}</div>
                <div class="card-body">
                    <form method="POST" class="form-group" action="{{ url('image')}}" enctype="multipart/form-data"
                        class="{{ $errors->has('image') ? ' is-invalid ' : '' }}custom-file-input">
                        @csrf
                        <div class="form-group row p-3">
                            <input type="file" id="image" name="image" required>
                        </div>
                        <div class="form-group">
                            <label for="location_id">Entrez la location de l'image</label>
                            <select id="location_id" name="location_id"
                                placeholder="Entrez la location, lieu de l'image" class="form-control">
                                <!-- Ici, on crée une variable location qui sera pris dans le controller d'image pour afficher les localisations. Si on en ajoute une dans le formulaire de la page pour ajputer des localisations, elle sera ensuite présente ici.  -->
                                @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Soumettre
                        </button>
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <!-- En cas de mauvais format d'image, on affiche une erreur. -->
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Entrez un bon format de fichier
                        </div>
                        @endif
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
