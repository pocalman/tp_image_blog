@extends('layouts.app')
@section('content')

<div class="container">
<table class="table table-striped table-bordered">
<h2>Les utilisateurs</h2>
<tr>
<th>Nom</th> 
<th>Courriel</th>  
<th>Date d'inscription</th>      
<th>Nombre d'images</th>  
<th class="text-center" >Éditer</th>  
<th class="text-center">Supprimer l'utilisateur</th>
</tr>
@auth
{!! csrf_field() !!}
        @foreach ($users as $user)
        <tr>
                    <td> {{$user->name}}</td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->created_at}} </td>
                    <td> {{$user->numb}} </td>
                    <td class="text-center"><a href = "editUser/{{ $user->id }}" class=" btn btn-success">Éditer</a></td>
                    <td class="text-center"><a href = "deleteUser/{{ $user->id }}" class=" btn btn-danger">Supprimer <i class="fas fa-trash-alt"></i></a></td>
        </tr>
        @endforeach
    @endauth
    </table>
   

@endsection