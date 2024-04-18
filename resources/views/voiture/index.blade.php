  {{-- card --}}
        {{-- <div class="row justify-content-center">
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
                </div> --}}

                {{-- condition if any errors happend it will showed here --}}
                {{-- @if (count($errors) > 0)
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
            </div> --}}


            {{-- <div class="col-md-8">
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
            </div> --}}

























        @extends('layouts.app')


        @section('title')
            Admin voiture
        @endsection

        @section('links')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        @endsection

        @section('content')

            <section>
                <div class="menu">
                    <ul>
                        <li class="profile">
                            <div class="img-box">
                                <img src="{{ URL('img/avatar.png') }}" alt="profile">
                            </div>
                            <h2>{{ Auth::user()->name }}</h2>
                        </li>


                        <li>
                            <a class="active" href="{{ route('voiture.index') }}"><i class="fas fa-car"></i>
                                <p>voiture</p>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('cat.show') }}"><i class="fas fa-list-ul"></i>
                                <p>categorie</p>
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('voiture.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
                                <p>ajoute</p>
                            </a>
                        </li>




                        <li class="log-out">
                            <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out"></i>
                                <p>se deconnecter</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>

                <div class="content">
                    <div class="title-info">
                        <p>dashboard</p>
                        <i class="fas fa-chart-bar"></i>
                    </div>

                    <div class="data-info">



                        {{-- voiture nombre --}}
                        <div class="box">
                            <i class="fas fa-car"></i>
                            <div class="data">
                                <p>voiture</p>
                                <span>{{ $numberOfVoiture }}</span>
                            </div>

                        </div>
                        {{-- category nomber --}}
                        <div class="box">
                            <i class="fas fa-list"></i>
                            <div class="data">
                                <p>category</p>
                                <span>{{ $numberOfCategory }}</span>
                            </div>

                        </div>

                    </div>
                    <div class="title-info">
                        <p>Les réservation Des Clients</p>
                        <i class="fas fa-calendar-check"></i>
                    </div>


                </div>
            </section>


            <style>
                * {
                    padding: 0 !important;
                    margin: 0 !important;
                    color: white
                }

                section {
                    display: flex !important
                }

                body {
                    background: #001;
                }

                .img-box {
                    width: 50px !important;
                    height: 50px !important;
                    border-radius: 50%;
                    overflow: hidden;
                    border: 3px solid white;
                    flex-shrink: 0
                }

                .img-box img {
                    width: 100% !important
                }

                .profile {
                    display: flex !important;
                    align-items: center;
                    gap: 30px
                }

                .profile h2 {
                    font-size: 20px !important;
                    text-transform: capitalize
                }

                .menu {
                    background-color: #123;
                    width: 90px !important;
                    height: 100vh !important;
                    padding: 20px !important;
                    overflow: hidden;
                    transition: .5s
                }

                .menu:hover {
                    width: 360px !important
                }

                ul {
                    list-style: none !important;
                    position: relative !important;
                    height: 95% !important
                }

                ul li a {
                    display: block !important;
                    padding: 10px !important;
                    margin: 10px 0 !important;
                    border-radius: 8px !important;
                    display: flex !important;
                    align-items: center !important;
                    gap: 40px !important;
                    transition: .5s !important
                }

                ul li a:hover,
                .active,
                .data-info .box:hover,
                td:hover {
                    background-color: #ffffff55 !important;
                }

                .log-out {
                    position: absolute !important;
                    bottom: 0 !important;
                    width: 100% !important
                }

                .log-out a {
                    background-color: #a00
                }


                ul li a i {
                    font-size: 25px !important;

                }

                .content {
                    width: 100% !important;
                    margin: 10px !important
                }

                .title-info {
                    background-color: #2c32ee !important;
                    padding: 10px !important;
                    display: flex !important;
                    align-items: center !important;
                    justify-content: space-between !important;
                    border-radius: 8px !important;
                    margin: 10px 0 !important
                }

                .data-info {
                    display: flex !important;
                    align-items: center !important;
                    justify-content: space-between !important;
                    flex-wrap: wrap !important;
                    gap: 10px !important;
                }

                .data-info .box {
                    background: #123 !important;
                    height: 150px !important;
                    flex-basis: 150px !important;
                    flex-grow: 1 !important;
                    border-radius: 8px !important;
                    display: flex !important;
                    align-items: center !important;
                    justify-content: space-around !important;
                }

                .data-info .box i {
                    font-size: 40px !important;
                }

                .data-info .box .data {
                    text-align: center !important
                }

                .data-info .box .data span {
                    font-size: 30px !important
                }
                table{
                    width: 100% !important;
                    text-align: center !important;
                    border-spacing: 8px !important
                }
                td,th{
                    background-color: #123 !important;
                    height: 40px !important;
                    border:1px solid #fff !important;


                }
                .demande:hover{
                    background-color: #123 !important
                }
                th{
                    background-color:#0080ff !important
                }
                .price ,.accepte,.refuse,.complete{
                    border-radius: 6px;
                    padding: 6px !important
                }
                .price{
                    background: var(--main-color);
                }
                .accepte{
                    background-color: #b6adad;
                }
                .refuse{
                    background: #d60000;
                }
                .complete{
                    background: #008915;
                }

            </style>





    @endsection
