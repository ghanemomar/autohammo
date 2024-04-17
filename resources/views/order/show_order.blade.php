@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Les Demandes Precedent</div>
                    <div class="card-body">
                        <div class="table table-bordered text-center table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col"> Nom </th>
                                        <th scope="col"> Phone </th>
                                        <th scope="col"> E-mail </th>
                                        <th scope="col"> La Date </th>
                                        <th scope="col"> Le Temps </th>
                                        <th scope="col"> Nom De Voiture </th>                                        
                                        <th scope="col"> Description</th>
                                        <th scope="col"> Prix  </th>
                                        <th scope="col"> L'addresse </th>
                                        <th scope="col"> L'etat Du Commande </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($order as $row)
                                    <tr>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->user->email }}</td>
                                        <td>{{ $row->date }}</td>
                                        <td>{{ $row->time }}</td>
                                        <td>{{ $row->voiture->name }}</td>
                                        <td>{{ $row->voiture->description }}</td>
                                        <td>{{ $row->voiture->price }}</td>
                                        <td>{{ $row->address }}</td>
                                        @if ($row->status == 'en attente!!')
                                            <td class="bg-secondary ">{{ $row->status }}</td>
                                        @elseif ($row->status == 'accetpte')
                                            <td class="bg-primary text-light">{{ $row->status }}</td>
                                        @elseif ($row->status == 'refuse')
                                            <td class="bg-danger text-light">{{ $row->status }}</td>
                                        @elseif ($row->status == 'complete')
                                            <td class="bg-success text-light">{{ $row->status }}</td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Aucune demande disponible</td>
                                    </tr>
                                @endforelse
                 
            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card-header {
            background-color: #32CD32;
            color: #ffff;
        }

        td {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        td:hover {
            background-color: rgb(183, 183, 183);
            color: white;
        }
    </style>
@endsection
