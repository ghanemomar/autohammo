@extends('layouts.app')


@section('title')
    Admin Dashboard
@endsection

@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection

@section('content')
    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @endif
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
                    <a href="{{ route('home') }}"><i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li>
                    <a href="{{ route('voiture.index') }}"><i class="fas fa-car"></i>
                        <p>voiture</p>
                    </a>
                </li>

                <li>
                    <a class="active" href="{{ route('cat.show') }}"><i class="fas fa-list-ul"></i>
                        <p>categorie</p>
                    </a>
                </li>




                <li class="log-out">
                    <a href="{{ route('logout') }}"
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


                <div class="box">
                    <i class="fas fa-user"></i>
                    <div class="data">
                        <p>Les utilisateur</p>
                        <span>{{ $numberOfUser }}</span>
                    </div>

                </div>


                <div class="box">
                    <i class="fas fa-car"></i>
                    <div class="data">
                        <p>voiture</p>
                        <span>{{ $numberOfVoiture }}</span>
                    </div>

                </div>


                <div class="box">
                    <i class="fas fa-list"></i>
                    <div class="data">
                        <p>category</p>
                        <span>{{ $numberOfCategory }}</span>
                    </div>

                </div>

            </div>
            <div class="title-info">
                <p>Ajouter une categorie</p>
                <i class="fas fa-calendar-check"></i>
            </div>


            <table class="cat-form">

                <form action="{{ route('cat.store') }}" method="post">
                    @csrf
                    <tr>
                        <td> <label for="name">Nom de Catégorie</label></td>
                        <td><input class="input-cat" type="text" name="cat_name" placeholder="nom de catégorie"></td>
                        <td><button class="complete" type="submit">Sauvegarder</button></td>
                    </tr>
                </form>
            </table>

            <div class="title-info">
                <p>les categories</p>
                <i class="fas fa-calendar-check"></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom de categorie</th>
                        <th>les actions</th>


                    </tr>
                </thead>

                <tbody>
                    @foreach ($cats as $key => $row)
                    <tr>
                        <th scope='row'>{{ $key + 1 }}</th>
                        <td id="id" hidden>{{ $row->id }}</td>
                        <td>{{ $row->cat_name }}</td>
                        <td ><button class="accepte">modifier</button>
                            <a href="{{ route('cat.delete', $row->id) }}"class="refuse"
                                id="delete">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                @endforeach
                <script>
                  $(document).ready(function() {
                 $('.accepte').on('click', function() {

        var $tr = $(this).closest('tr');

        var categoryId = $tr.find('#id').text();
        var categoryName = $tr.find('td:eq(1)').text();

        var formElement = '<form action="{{ route('cat.update') }}" method="post" class="update-form"> @csrf  <input type="hidden" name="id" value="' + categoryId + '"> <input type="text" class="form-control" name="cat_name" value="' + categoryName + '"> <button type="submit" class="">Save</button> </form>' ;

        console.log(formElement);

        $tr.find('td:eq(2)').html(formElement);


        $(this).hide();
        $tr.find('.refuse').hide();
    });
});

                </script>

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


        .update-form button[type="submit"] {
    background-color: #007bff; /* Couleur de fond du bouton */
    color: #fff; /* Couleur du texte du bouton */
    border: none; /* Supprimer la bordure */
    padding: 8px 16px; /* Ajouter de l'espace intérieur au bouton */
    border-radius: 4px; /* Coins arrondis */
    cursor: pointer; /* Curseur de souris en forme de main au survol */
    transition: background-color 0.3s ease, color 0.3s ease; /* Transition fluide pour les changements de couleur */
}

.update-form button[type="submit"]:hover {
    background-color: #0056b3; /* Couleur de fond au survol */
    color: #fff; /* Couleur du texte au survol */
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

        table {
            width: 100% !important;
            text-align: center !important;
            border-spacing: 8px !important
        }

        td,
        th {
            background-color: #123 !important;
            height: 40px !important;
            border: 1px solid #fff !important;


        }

        .demande:hover {
            background-color: #123 !important
        }

        th {
            background-color: #0080ff !important
        }

        .price,
        .accepte,
        .refuse,
        .complete {
            border-radius: 6px;
            padding: 6px !important;
            color:white
        }

        .price {
            background: var(--main-color);
        }

        .accepte {
            background-color: #b6adad;
        }

        .refuse {
            background: #d60000;
        }

        .complete {
            background: #008915;
            border:none
        }
        .input-cat{
            width: 80%;
            border: 1px solid #ffff;
            border-radius:5px;
            box-shadow: 1px ;
            padding:9px !important;
            background-color: #123;
        }
        .cat-form{
            margin-bottom: 2rem !important
        }
    </style>


@endsection
