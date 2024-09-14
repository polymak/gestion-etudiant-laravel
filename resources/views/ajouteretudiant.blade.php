@extends('layouts.master')

@section('contenu')

<h3>Ajouter Etudiant</h3>
<br>
<br>
@foreach ($errors->all() as $error)
    <div> {{$error}} </div>
@endforeach

@if (session()->has('success'))
    <alert class="alert alert-success"> {{session('success')}} </alert>
@endif

<form action="{{route('ajout.etudiant.action')}}" method="post">

    @csrf

    <div>
        <label for="nom" class="form-label">NOM ETUDIANT</label>
        <input type="text" class="form-control" id="nom" placeholder="Saisir le nom" name="nom">
    </div>
    <br>
    <div>
        <label for="prenom" class="form-label">PRENOM ETUDIANT</label>
        <input type="text" class="form-control" id="prenom" placeholder="Saisir le prénom" name="prenom">
    </div>
    <br>
    <div>
        <label for="filiere" class="form-label">FILIERE ETUDIANT</label>
       <select  class="select-form" id="filiere" name="filiere_id" >

        @foreach ($filieres as $filiere)
        <option value="{{$filiere->id}}"> {{$filiere->libelle}} </option>
        @endforeach

       </select>
    </div>
    <br>
    <button class="btn btn-success">Ajouter</button>

</form>
    
@endsection