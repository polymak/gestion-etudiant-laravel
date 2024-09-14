@extends('layouts.master')

@section('contenu')

<h3>Modifier Etudiant</h3>
<br>
<br>
@foreach ($errors->all() as $error)
    <div> {{$error}} </div>
@endforeach

@if (session()->has('success'))
    <alert class="alert alert-success"> {{session('success')}} </alert>
@endif

<form action="{{route('action.modifier.etudiant', ['etudiant'=>$etudiantmodif->id])}}" method="post">

    @csrf

    <div>
        <label for="nom" class="form-label">NOM ETUDIANT</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{$etudiantmodif->nom}}">
    </div>
    <br>
    <div>
        <label for="prenom" class="form-label">PRENOM ETUDIANT</label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="{{$etudiantmodif->prenom}}">
    </div>
    <br>
    <div>
        <label for="filiere" class="form-label">FILIERE ETUDIANT</label>
       <select  class="select-form" id="filiere" name="filiere_id" >
        <option value="{{$etudiantmodif->filiere->id}}">{{$etudiantmodif->filiere->libelle}}</option>
        @foreach ($filieres as $filiere)
        <option value="{{$filiere->id}}">{{$filiere->libelle}}</option>
        @endforeach
        
       </select>
    </div>
    <br>
    <button class="btn btn-success">Modifier</button>

</form>
    
@endsection