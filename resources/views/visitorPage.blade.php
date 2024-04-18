@extends('layouts.app')
@section('nav')
@extends('layouts.nav')
@endsection

@section('content')
<section id="home" class="home">
    <div class="text">
        <h1><span>Salon Auto Hammou </span> <br> le plus grand  salon<br> de voitures à<br> Rabat </h1>
        <p>qui assure un très bon achat et vente de voitures neuves et d occasion personnel spécialisé qui cherche en premier lieu la satisfaction de la clientèle voitures de toutes marques confortables et prix convenables Ne ratez pas cette occasion et visitez notre salon car vous seriez trop satisfait  adoption de l horaire continu de 9 h  à  19h30  du lundi au dimanche.</p>
    </div>
</section>
<section class="services" id="services">
    <div class="heading">
        <span>Nos meilleurs services</span>
        <h1>Explorez nos meilleures offres</h1>
    </div>
    <div  class="services-container">
        @forelse ($voitures as $voiture)
        <div class="box">
            <div class="box-img">
                <img src="{{ asset($voiture->image1) }}" class="img-thmbnail" style="width:100%" alt="">
             </div>

                <h3>{{ $voiture->name }} </h3>
                <h3>{{ $voiture->description }}</h3>
                <h2>{{ $voiture->price }} DH / Jours </h2>
                <a href="{{ route('voiture.details', $voiture->id) }}" style='font-size:16px'
                    title="Add Cart" class="btn">Voir plus</a>
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
        <a


          href="#!"

          ><img src="{{URL('/icons/f.svg')}}" alt=""></a>

        <!-- Twitter -->
        <a
          data-mdb-ripple-init
          href="#!"

          ><img src="{{URL('/icons/x.png')}}" ></a>



        <!-- Instagram -->
        <a

          ><img src="{{URL('/icons/i.png')}}"></a>


      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        <span id="currentYear"></span> Copyright:
        <strong> Auto hamou</strong>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        <a href="{{ route('login') }}">Admin</a>
    </div>

    <script>
        document.getElementById("currentYear").textContent = new Date().getFullYear();
    </script>
    <!-- Copyright -->
  </footer>
<style>
    .home{
        width:100% !important;
        min-height: 100vh !important;
        position: relative !important;
        background: url({{ asset("/img/CAR.png") }}) !important;
    }
    .home{
        background-repeat:no-repeat !important;
        background-position:center right !important;
        background-size: cover !important;
        display: grid !important;
        align-items: center !important ;
        display: grid !important;
        align-items: center ;
        grid-template-columns: repeat(2,1fr)
    }
    .text h1{
        font-size:3.5rem !important;
        letter-spacing: 2px !important;
        margin-right: 3rem !important;
        margin-left:1rem !important
    }
    .text span{
        color:var(--main-color);
    }
    .text p {
        margin-right: 3rem !important;
        margin-left:1rem !important

    }

.services-container{
    display: grid !important;
    grid-template-columns: repeat(auto-fit, minmax(300px,auto)) !important;
    gap:1rem !important;
    margin-top:2rem !important;
}
.heading{
    text-align: center !important;
}

.heading span{
    font-weight: bold !important;
    font-size: 1.2rem !important
}
.services-container .box{
    padding: 10px !important;
    border-radius: 1rem !important;
    box-shadow: 1px 4px 41px rgba(0, 0, 0, 0.1) !important;
}

.services-container .box .box-img{
width: 100% !important;
height: 300px !important
}
.services-container .box .box-img img{
    width: 100% !important;
    height: 80% !important;
    border-radius: 1rem !important;
    object-fit: cover !important;
    object-position: center !important
}
.services-container .box p{
    padding: 0 10px !important;
    border: 1px solid var(--text-color) !important;
    width:58px !important;
    border-radius: 0.5rem !important;
    margin: 1rem 0 1rem !important
}
.services-container .box h3{
    font-weight: 500 !important;
}
.services-container .box h2{
    font-size: 1.1rem !important;
    font-weight: 600 !important;
    color: var(--main-color) !important;
    margin:0.2rem 0 0.5rem !important;
}

.services-container .box h2 span{
    font-size:0.8rem !important;
    font-weight: 500 !important;
    color: var(--text-color) !important;
}



.services-container .box .btn{
    display: flex !important;
    justify-content: center !important;
    background-color: #474fa0 !important;
    color: #fff !important;
    padding: 10px !important;
    border-radius: 0.5rem !important;
}

.services-container .box .btn:hover{
    background: var(--main-color) !important
}

footer img{
    width:46px !important;
    height: 34px !important
}

@media (max-width:991px){
    header{
        padding: 18px 40px !important;

    }
    section{
        padding: 50px 40px
    }
}
@media (max-width:981px){
    .home{
        background-position: left !important;

    }

}
@media (max-width:768px){
    header{
        paddin:11px 40px !important;
    }
    #menu-icon{
        display: initial !important
    }
    .text h1{
        font-size: 2.5rem !important
    }
    .home{
        grid-template-columns: 1fr !important
    }
    .form-container form{
        position: unset !important;
    }
    header navbar{
        position: absolute !important;
        top : 100% !important;
        left:0 !important;
        display: flex !important;
        flex-direction: column !important;
        background: #fff !important;
        box-shadow: 0 4px 4px rgba(0,0,0,0.1) !important;
        transition:0.2s ease !important;
        text-align:left !important;
    }
    .navbar a {
        padding :1rem;
        border-left:2px solid var(--main-color);
        margin:1rem;
        display: block
    }
}

</style>
@endsection
