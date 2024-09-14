@extends('layouts.master')

@section('contenu')

<h3>Ajouter Filière</h3>
<br>
<br>
@foreach ($errors->all() as $error)
    <div> {{$error}} </div>
@endforeach

@if (session()->has('success'))
    <alert class="alert alert-success"> {{session('success')}} </alert>
@endif

<form action="{{route('ajout.filiere.action')}}" method="post">

    @csrf

    <div>
        <label for="libelle" class="form-label">LIBELLE</label>
        <input type="text" class="form-control" id="libelle" placeholder="Saisir le nom de la filière" name="libelle">
    </div>
    <br>
    <div>
        <label for="description" class="form-label">DESCRIPTION</label>
        <input type="text" class="form-control" id="description" placeholder="Saisir la description" name="description">
    </div>
    <br>
    <button class="btn btn-success">Ajouter</button>

</form>
    
@endsection