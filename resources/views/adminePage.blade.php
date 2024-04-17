@extends('layouts.app')


@section('title')
    Admin Dashboard
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
                    <a class="active" href="{{ route('home') }}"><i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li>
                    <a href="{{ route('voiture.index') }}"><i class="fas fa-car"></i>
                        <p>voiture</p>
                    </a>
                </li>

                <li>
                    <a href="{{ route('cat.show') }}"><i class="fas fa-list-ul"></i>
                        <p>categorie</p>
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
                {{-- users box --}}
                <div class="box">
                    <i class="fas fa-user"></i>
                    <div class="data">
                        <p>Les utilisateur</p>
                        <span>{{ $numberOfUser }}</span>
                    </div>

                </div>
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

            <table>
                <thead>
                    <tr>
                        <th >Nom </th>
                        <th >Téléphone</th>
                        <th >La Date</th>
                        <th >Nom Du Voiture</th>
                        <th >Prix de Location(dh)</th>
                        <th >Address</th>
                        <th >Etat</th>
                        <th >Demande </th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($order as $row)
                        <tr>
                            <td>{{ $row->user->name }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->date }}</td>
                            <td>{{ $row->voiture ->name }}</td>
                            <td><span class="price">{{ $row->voiture->price }} DH</span></td>
                            <td><span class="adress">{{ $row->address }}</span></td>
                            <td><span class="status">{{ $row->status }}</span></td>

                        <form action="{{route('order.status',$row->id)}}" method="post">
                            @csrf
                            <td class="demande"> <input type="submit" name="status" class="accepte" value="accetpte">
                             <input class="refuse" type="submit" name="status"  value="refuse">
                            <input class="complete" type="submit" name="status"  value="complete"></td>
                        </form>
                        </tr>

                    @endforeach


                </tbody>
            </table>
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
            width: 280px !important
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
