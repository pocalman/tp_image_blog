@extends('layouts.app')
@section('content')

<div class="container">
<h3>Pseudonyme: {{$users->name}}</h3>
<form action="/updateUserName/{{$users->id}}"  enctype="multipart/form-data" class="form-group" method="POST">
{{csrf_field()}}
    <p class="font-weight-bold">Changer de pseudonyme</p>
    <input type = 'text' name ='name' required>
    <button type="submit" class="btn btn-success">Éditer</button>
    </form>
<h3>Courriel: {{$users->email}}</h3>
<form action="/updateUserMail/{{$users->id}}"  enctype="multipart/form-data" class="form-group" method="POST">
{{csrf_field()}}
    <p class="font-weight-bold">Changer de courriel</p>
    <input type = 'text' name ='mail' required>
    <button type="submit" class="btn btn-success">Éditer</button>
    </form>

    <form action="/updateUserPassword/{{$users->id}}"  enctype="multipart/form-data" class="form-group" method="POST">
{{csrf_field()}}
    <p class="font-weight-bold">Changer de mot de passe</p>
    <input type = 'text' name ='password' required>
    <button type="submit" class="btn btn-success">Éditer</button>
    </form>

</div>

@endsection