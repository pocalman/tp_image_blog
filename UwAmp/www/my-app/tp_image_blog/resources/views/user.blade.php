@extends('layouts.app')
@section('content')

@auth
    <div class="container">
    <h2>Gérér mon profil</h2>
    <h3>Pseudonyme: {{Auth::user()->name }}</h3>
    <form action= "editname/{{Auth::user()->id }}" enctype="multipart/form-data" class="form-group" >
    <p class="font-weight-bold">Changer de pseudonyme</p>
    <label for="name">{{ __('Nouveau pseudonyme') }}</label>
    <input type = 'text' name = 'name' required>
    <button type="submit" class="btn btn-success">Éditer</button>
    </form>
    <h3>Courriel: {{Auth::user()->email }}</h3>
    <form action= "editmail/{{Auth::user()->id }}" enctype="multipart/form-data" class="form-group" >
    <p class="font-weight-bold">Changer de courriel</p>
    <label for="email">{{ __('Nouveau courriel') }}</label>
    <input type = 'email' name = 'email' class="{{ $errors->has('email') ? ' is-invalid' : '' }}" required>
    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
    <button type="submit" class="btn btn-success">Éditer</button>
    </form>
    <h3>Mot de passe</h3>
    <form action= "editpassword/{{Auth::user()->id }}" enctype="multipart/form-data" class="form-group" >
    <p class="font-weight-bold">Changer de mot de passe</p>
    <label for="password">{{ __('Nouveau mot de passe') }}</label>
    <input type = 'text' name = 'password' required>
    <button type="submit" class="btn btn-success">Éditer</button>
    </form>
    </div>
    @endauth

    @auth

    @if (Auth::user()->level=='user')

    <form action= "deleteAccount/{{Auth::user()->id }}" enctype="multipart/form-data" class="form-group">
    <div class="container mt-5">
    <button type="submit" class="btn btn-danger mb-3">Supprimer mon compte <i class="fas fa-trash-alt"></i></button>
    </form>
    </div>
    @endif
    @endauth





@endsection
