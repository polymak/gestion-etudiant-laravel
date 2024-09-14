@extends('layouts.master')

@section('contenu')

<h2>Liste des Filières</h2>
<br> 
<table class="table">
    <thead>
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Nom Filière</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($filieres as $filiere)
            <tr>
                <th scope="row">{{$filiere->id}}</th>
                <td> {{$filiere->libelle}} </td>
                <td> {{$filiere->description}} </td>
                <td>
                    <a href="#" class=""><i class="fa fa-edit"></i></a>
                    <a href="#" class="text-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
   {{$filieres->links() }}
@endsection