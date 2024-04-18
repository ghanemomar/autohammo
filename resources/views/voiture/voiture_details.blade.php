@extends('layouts.app')
@section('nav')
    @extends('layouts.nav')
@endsection
@section("title",'details')
@section('content')
    <h2 style="text-align:center">Slideshow Gallery</h2>

    <div class="container" style="text-align: center;">
        <div class="mySlides">
            <div class="numbertext">1 / 4</div>
            <img src="{{ asset($voiture->image1) }}" style="width: 735px; height: 400px; padding-top: 10px;">
        </div>
        <div class="mySlides">
            <div class="numbertext">2 / 6</div>
            <img src="{{ asset($voiture->image2) }}" style="width: 735px; height: 400px; padding-top: 10px;">
        </div>
        <div class="mySlides">
            <div class="numbertext">3 / 6</div>
            <img src="{{ asset($voiture->image3) }}" style="width: 735px; height: 400px; padding-top: 10px;">
        </div>
        <div class="mySlides">
            <div class="numbertext">4  /6</div>
            <img src="{{ asset($voiture->image4) }}" style="width: 735px; height: 400px; padding-top: 10px;">
        </div>
        <div class="mySlides">
            <div class="numbertext">5 / 6</div>
            <img src="{{ asset($voiture->image5) }}" style="width: 735px; height: 400px; padding-top: 10px;">
        </div>
        <div class="mySlides">
            <div class="numbertext">6 / 6</div>
            <img src="{{ asset($voiture->image6) }}" style="width: 735px; height: 400px; padding-top: 10px;">
        </div>

        <!-- Additional mySlides here for other images -->

        <div class="row">
            <div class="column">
                <img class="demo cursor" src="{{ asset($voiture->image1) }}" style="width:100%" onclick="currentSlide(1)">
            </div>
            <div class="column">
                <img class="demo cursor" src="{{ asset($voiture->image2) }}" style="width:100%" onclick="currentSlide(2)">
            </div>
            <div class="column">
                <img class="demo cursor" src="{{ asset($voiture->image3) }}" style="width:100%" onclick="currentSlide(3)">
            </div>
            <div class="column">
                <img class="demo cursor" src="{{ asset($voiture->image4) }}" style="width:100%" onclick="currentSlide(4)">
            </div>
            <div class="column">
                <img class="demo cursor" src="{{ asset($voiture->image4) }}" style="width:100%" onclick="currentSlide(4)">
            </div>

        </div>
    </div>



    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("demo");
            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>


    {{-- Card Detail --}}
    <div class="card" style="max-width: 600px; margin: 0 auto; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background-color: #fefeff; border: 2px solid #3e64ff;">
        <h1 style="font-size: 28px; color: #3e64ff; margin-bottom: 15px;">{{$voiture->name}}</h1>
        <h3 style="font-size: 18px; color: #333; margin-bottom: 10px;">Description: {{$voiture->description}}</h3>
        <h3 style="font-size: 18px; color: #333; margin-bottom: 10px;">Prix: {{$voiture->price}}</h3>
        <h3 style="font-size: 18px; color: #333; margin-bottom: 10px;">Catégorie: {{$voiture->category}}</h3>
    </div>

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
        .row{
            margin-bottom: 20px;
            margin-top: 10px;
            margin-left:19px
        }

        .row .column{
            background-color: #dedede;
            padding: 10px;
            margin-left: 1px;
            box-shadow: 20px black;
            border-radius: 5px

        }
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        .container {
            position: relative;
            margin: 0 auto;
            margin-top: 10vh;
            /* Center horizontally */
            max-width: 800px;
            /* Adjust max-width as needed */
        }

        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .column {
            float: left;
            width: 19%;
        }

        .mySlides {
            display: none;
            background: #82828209;
            padding: 12px;
            border-radius: 10px
        }
        .mySlides img{
            width: 500px !important;
            height: 500px !important
        }
        .demo {
            opacity: 0.6;
            cursor: pointer;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }
        footer img {
            width: 46px !important;
            height: 34px !important
        }
    </style>

@endsection
