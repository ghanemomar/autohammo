{{-- @extends('layouts.app') --}}

{{-- @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">La Liste</div>
                    <div class="card-body">
                        <form action="" method="get">
                            @csrf
                            <ul class="list-group">
                                <a href="/home" class="list-group-item list-group-item-action">La Page D'accueil</a>
                            </ul>
                            @foreach ($cats as $row)
                                <ul class="list-group">
                                    <input type="submit" value="{{ $row->cat_name }}" name="category"
                                        class="list-group-item list-group-item-action">
                                </ul>
                            @endforeach
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header text-center">Les Demandes Precedent</div>
                    <div class="card-body text-right">
                        <form action="" method="get">
                            <ul class="list-group">
                                <a href="/order/show" class="list-group-item list-group-item-action">Afficher Les Demandes
                                    Precedent</a>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>{{ $cat1 }}</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            @forelse ($voitures as $voiture)
                                <div class="col-md-4 mt-2 text-center" style="border:1px solid rgba(149,212,159)">
                                    <a href="{{ route('voiture.details', $voiture->id) }}"> <img src="{{ asset($voiture->image) }}" class="img-thmbnail" style="width:100%"
                                        alt=""></a>
                                    <strong>{{ $voiture->name }}</strong>
                                    <p>{{ $voiture->description }}</p>
                                    <div class="">
                                        <a href="{{ route('voiture.details', $voiture->id) }}" style='font-size:16px'
                                            title="Add Cart" class="btn btn-success">
                                            <i class="fa fa-bell-slash-o" style="font-size: 12px;color:white">Réservez
                                                Maintenant
                                        </a></i>
                                    </div>
                                    <br>
                                </div>
                            @empty
                                No Voitures Exist Maintenant
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}



{{-- style part --}}
{{-- <style>
        img {
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        img:hover {
            opacity: 0.8;
            transform: scale(0.9);
        }

        a.list-group-item {
            font-size: 18px;
        }

        a.list-group-item:hover {
            background-color: rgb(61, 114, 56);
            color: #fff;
        }

        .card-header {
            background-color: rgb(47, 160, 36);
            color: #ffff;
            font-size: 20px
        }
    </style> --}}
{{-- @endsection --}}


@extends('layouts.app')
@section('nav')
    @extends('layouts.nav')
@endsection
@section('content')
    <section id="home" class="home">
        <div class="text">
            <h1><span>Cherchez-vous </span> une voiture<br>de location</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis maiores officia ipsum non deserunt. Sunt
                cupiditate deserunt labore quasi corporis illum .</p>
        </div>
    </section>


    <section class="services" id="services">
        <div class="heading">
            <span>Nos meilleurs services</span>
            <h1>Explorez nos meilleures offres</h1>
        </div>
        <div class="services-container">
            @forelse ($voitures as $voiture)
                <div class="box">
                    <div class="box-img">
                        <img src="{{ asset($voiture->image) }}" class="img-thmbnail" style="width:100%" alt="">
                    </div>
                    {{-- <p>2017</p> --}}
                    <h3>{{ $voiture->name }} </h3>
                    <h5>{{ $voiture->description }}</h5>
                    <h2>{{ $voiture->price }} DH / Jours </h2>
                    <a href="{{ route('voiture.details', $voiture->id) }}" style='font-size:16px' title="Add Cart"
                        class="btn">Réservez Maintenant</a>
                </div>
            @empty
                <div class="box">
                    <div class="box-img">
                    </div>
                    <h1>Aucune voiture disponible maintenant</h1>

                </div>
            @endforelse
    </section>
    <footer class="mt-5 bg-body-tertiary text-center mb-0">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a href="#!"><img src="{{ URL('/icons/f.svg') }}" alt=""></a>

                <!-- Twitter -->
                <a data-mdb-ripple-init href="#!"><img src="{{ URL('/icons/x.png') }}"></a>



                <!-- Instagram -->
                <a><img src="{{ URL('/icons/i.png') }}"></a>


            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            <span id="currentYear"></span> Copyright:
            <a class="text-body" href="https://mdbootstrap.com/">Reservation company</a>
        </div>

        <script>
            document.getElementById("currentYear").textContent = new Date().getFullYear();
        </script>
        <!-- Copyright -->
    </footer>
    <style>
        .home {
            width: 100% !important;
            min-height: 100vh !important;
            position: relative !important;
            background: url({{ asset('/img/CAR.png') }}) !important;
        }

        .home {
            background-repeat: no-repeat !important;
            background-position: center right !important;
            background-size: cover !important;
            display: grid !important;
            align-items: center !important;
            display: grid !important;
            align-items: center;
            grid-template-columns: repeat(2, 1fr)
        }

        .text h1 {
            font-size: 3.5rem;
            letter-spacing: 2px;
        }

        .text span {
            color: var(--main-color);
        }

        .text p {
            margin: 0.5rem 0 1rem;
        }

        .services-container {
            display: grid !important;
            grid-template-columns: repeat(auto-fit, minmax(300px, auto)) !important;
            gap: 1rem !important;
            margin-top: 2rem !important;
        }

        .heading {
            text-align: center;
        }

        .heading span {
            font-weight: bold;
            font-size: 1.2rem
        }




        .services-container .box {
            padding: 10px !important;
            border-radius: 1rem !important;
            box-shadow: 1px 4px 41px rgba(0, 0, 0, 0.1) !important;
        }

        .services-container .box .box-img {
            width: 250% !important;
            height: 250px !important
        }

        .services-container .box .box-img img {
            width: 250px !important;
            height: 250px !important;
            border-radius: 1rem !important;
            object-fit: cover !important;
            object-position: center !important
        }

        .services-container .box p {
            padding: 0 10px !important;
            border: 1px solid var(--text-color) !important;
            width: 58px !important;
            border-radius: 0.5rem !important;
            margin: 1rem 0 1rem !important
        }

        .services-container .box h3 {
            font-weight: 500 !important;
        }

        .services-container .box h2 {
            font-size: 1.1rem !important;
            font-weight: 600 !important;
            color: var(--main-color) !important;
            margin: 0.2rem 0 0.5rem
        }

        .services-container .box h2 span {
            font-size: 0.8rem !important;
            font-weight: 500 !important;
            color: var(--text-color) !important;
        }



        .services-container .box .btn {
            display: flex !important;
            justify-content: center !important;
            background-color: #474fa0 !important;
            color: #fff !important;
            padding: 10px !important;
            border-radius: 0.5rem !important;
        }

        .services-container .box .btn:hover {
            background: var(--main-color) !important
        }

        footer img {
            width: 46px;
            height: 34px
        }
    </style>
@endsection
