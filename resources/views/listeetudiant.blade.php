@extends('layouts.master')

@section('contenu')

@if (session()->has('success'))
    <alert class="alert alert-success"> {{session('success')}} </alert>
@endif

<h2>Liste des Etudiants</h2>
<br> 
<table class="table">
    <thead>
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Filière</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($etudiants as $etudiant)
            <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <td> {{$etudiant->nom}} </td>
                <td> {{$etudiant->prenom}} </td>
                <td> {{$etudiant->filiere->libelle}} </td>
                <td>
                    <a href="{{route('modifier.etudiant', ['etudiant'=>$etudiant->id])}}" class=""><i class="fa fa-edit"></i></a>
                    <a href="#" class="text-danger" onclick="if(confirm('Voulez-vous supprimer?')){
                    document.getElementById('form-{{$etudiant->id}}').submit()
                    }"><i class="fa fa-trash"></i></a>
                <form action="{{route('supprimer.etudiant', ['etudiant'=>$etudiant->id])}}" method="post" id="form-{{$etudiant->id}}">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
   {{$etudiants->links() }}
@endsection