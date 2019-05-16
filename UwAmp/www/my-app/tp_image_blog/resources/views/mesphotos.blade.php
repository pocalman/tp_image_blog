@extends('layouts.app')
@section('content')

<div class="container">
<table class="table table-striped table-bordered">
<h2>Mes images</h2>
<tr>
<th>Sélectionner</th>
<th>Image</th> 
<th>Localisation</th>    
<th>Utilisateur</th>
<th>Date</th>   
</tr>
@auth
<form action="{{ url('/multipleDeletes') }}" method="post"> 
{!! csrf_field() !!}
        @foreach ($photos as $photo)
        <tr>
        <td><input type="checkbox" name="delete[]" value="{{$photo->id}}"></td>
        <td> <a href="/storage/images/{{$photo->name}}"><img src="/storage/thumbs/{{$photo->name}}"
                                        style="height: 100px;"></a></td>
                    <td> {{$photo->city}}</td>
                    <td> {{$photo->utilisateur}} </td>
                    <td> {{$photo->created_at}} </td>
        </tr>
        @endforeach
        <button type="submit" class="btn btn-danger mb-3">Supprimer les photos sélectionnées <i class="fas fa-trash-alt"></i></button>
    </form>
    @endauth
    </table>
    </div>

    <div class="container">
<table class="table table-striped table-bordered">
<h2>Images signalées</h2>
<tr>
<th>Sélectionner</th>
<th>Image</th> 
<th>Localisation</th>    
<th>Utilisateur</th>
<th>Date</th> 
<th>Nombre de signalement</th>    
</tr>
@auth
<form action="{{ url('/multipleDeletes') }}" method="post"> 
{!! csrf_field() !!}
        @foreach ($signaled as $alert)
        <tr>
        <td><input type="checkbox" name="delete[]" value="{{$alert->id}}">{{$alert->id}}</td>
        <td> <a href="/storage/images/{{$alert->name}}"><img src="/storage/thumbs/{{$alert->name}}"
                                        style="height: 100px;"></a></td>
                    <td> {{$alert->city}}</td>
                    <td> {{$alert->utilisateur}} </td>
                    <td> {{$alert->created_at}} </td>
                    <td> {{$alert->numb}} </td>
        </tr>
        @endforeach
        <button type="submit" class="btn btn-danger mb-3">Supprimer les photos sélectionnées <i class="fas fa-trash-alt"></i></button>
    </form>
    @endauth
    </table>
    </div>

@endsection
