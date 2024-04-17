@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- card --}}
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div style="background-color: #A52A2A" class="card-header  text-light text-center">La Liste</div>
                    <div class="card-body ">
                        <ul class="list-group">
                            <a href="{{ route('cat.show') }}" class="list-group-item list-group-item-action">Ajouter Une
                                Categorie
                            </a>
                            <a href="{{ route('voiture.create') }}" class="list-group-item list-group-item-action">Ajouter une
                                Voiture </a>
                            <a href="{{ route("home") }}" class="list-group-item list-group-item-action">Les Demandes Des Clients</a>
                        </ul>
                    </div>
                </div>

                {{-- condition if any errors happend it will showed here --}}
                @if (count($errors) > 0)
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>


            <div class="col-md-8">
                <div class="card">
                    <div style="background-color: #A52A2A" class="card-header text-center text-light">Les Voitures</div>
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Photo Du Voiture</th>
                                <th scope="col">Nom De Voiture</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Prix ($)</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>

                            </tr>

                        </thead>
                        <tbody>

                            @if (count($voitures)>0)
                            @foreach ($voitures as $row)
                            <tr>
                                    <th scope="row">{{ $row->id }}</th>
                                    <td><img src="{{asset($row->image)}}" width="120"></td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td>{{ $row->category }}</td>
                                    <td>{{ $row->price }} DH</td>
                                    <td><a href="{{route('voiture.edit',$row->id)}}"><button class="btn btn-primary">Modifier</button></a></td>
                                    <td> <a href="{{route('voiture.delete',$row->id)}}" class="btn btn-danger" id="delete">Supprmier</a></td>
                            </tr>
                            @endforeach
                            @else
                            <td colspan="7">Il n'y a Aucun Voitures</td>
                            @endif
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>




    @endsection
