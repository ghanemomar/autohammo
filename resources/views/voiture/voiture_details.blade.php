@extends('layouts.app')
@section('nav')
@extends("layouts.nav")
@endsection
@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-center text-light">
                        voiture
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                <h3><strong style="color:seagreen;font-size:20px">Category De Voiture :
                                    {{ $voiture->category }}</h3>
                                </p>
                                <p>
                                <h3>Nom De Voiture : {{ $voiture->name }}
                                </h3>
                                </p>
                                <p>
                                <h3>Prix De Voiture
                                        :{{ $voiture->price }}</h3>
                                </p>
                                <p>
                                <h3>Description Du Voiture :
                                    {{ $voiture->description }}</h3>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset($voiture->image) }}" class="img-thumbnail" style="width:500px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success text-center text-light">Information De Commande</div>
                    <div class="card-body ">
                        @if (Auth::check())
                            <form action="{{route('order.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <p>Nom :
                                        {{ auth()->user()->name }}</p>
                                    <p>E-mail :
                                        {{ auth()->user()->email }}</p>
                                    <p>Numero de
                                            Telephone : <input type="number" class="form-control" name="phone"
                                            required></p>

                                    <input type="hidden" name="voiture_id" value="{{$voiture->id}}">
                                    <p>La date
                                            : <input type="date" class="form-control" name="date" required>
                                    </p>
                                    <p>Le temps
                                            : <input type="time" class="form-control" name="time" required>
                                    </p>
                                    <p>L'addresse
                                            :
                                        <textarea type="number" class="form-control" name="address" required></textarea>
                                    </p>
                                    <p class="text-center">
                                        <button class="btn btn-success" type="submit" style="font-size: 20px">Reservez
                                            Maintenant</button>
                                    </p>
                                </div>
                            </form>
                        @else
                            <p><a href="/login">Veuillez vous connecter, s'il vous plaît.</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="cardd">
        <div class="picture">
            <div class="image">
                <img src="{{ asset($voiture->image) }}" alt="">
            </div>
            <div class="details">
                <div><span>Category De Voiture</span><p> : {{ $voiture->category }}</p></div>
                <div><span>Nom De Voiture : </span><p>{{ $voiture->name }}</p></div>
                <div><span>Prix De Voiture : </span><p>{{ $voiture->price }} MAD</p></div>
                <div><span>Description Du Voiture :</span><p>{{ $voiture->description }}</p></div>
               </div>
        </div>

        <div class="reservez">
            <form action="{{route('order.store')}}" method="post" class="reservation-form">
                @csrf
                <div class="form-group">
                    <label for="name">Nom : <span>{{ auth()->user()->name }}</span></label>

                </div>
                <div class="form-group">
                    <label for="email">E-mail : <span>{{ auth()->user()->email }}</span></label>

                </div>
                <div class="form-group">
                    <label for="phone">Numero de Telephone :</label>
                    <input type="number" name="phone" id="phone" required>
                </div>
                <div class="form-group">
                    <label for="date">La date :</label>
                    <input type="date" name="date" id="date" required>
                </div>
                <div class="form-group">
                    <label for="time">Le temps :</label>
                    <input type="time" name="time" id="time" required>
                </div>
                <div class="form-group">
                    <label for="address">L'addresse :</label>
                    <textarea name="address" id="address" required></textarea>
                </div>
                <input type="hidden" name="voiture_id" value="{{$voiture->id}}">
                <button type="submit">Reservez Maintenant</button>
            </form>
        </div>


    </div>








    <style>
        .cardd {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
    margin-top:5rem;
    margin-left: 5rem;
    margin-right: 5rem

}

.picture {
    width: 90%;
    grid-column: 1 / span 1;
}

.reservez {
    grid-column: 2 / 2;
    padding: 20px !important;
    border-radius: 1rem !important;
    box-shadow: 1px 4px 41px rgba(0, 0, 0, 0.1) !important;
    width: 95%

}
.reservez {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.reservez .form-group {
    margin-bottom: 15px;
}

.reservez label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.reservez input[type="number"],
.reservez input[type="date"],
.reservez input[type="time"],
.reservez textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}






/* Optional: Adjust styles as needed */
.picture {

    display: flex;
    flex-direction: column;
    padding: 20px !important;
    border-radius: 1rem !important;
    box-shadow: 1px 4px 41px rgba(0, 0, 0, 0.1) !important;

}
.details span{
    font-size: 1.6rem;
    font-weight: 700;
    color: var(--text-color)
}
.details div{
    margin-bottom: 1rem
}
.reservez {
    display: flex;
    flex-direction: column;
}
.image{
    width: 70% !important;
    height: 300px !important;
    display: flex; /* Use flexbox */
    justify-content: center; /* Center the content horizontally */
    align-items: center; /* Center the content vertically */
    margin: auto;
    margin-bottom: 2rem

}
.image img{
    width: 100% !important;
    height: 100% !important;
    border-radius: 1rem !important;
    object-fit: cover !important;
    object-position: center !important
}
/* Adjustments for form inputs */


button{
    display: flex !important;
    justify-content: center !important;
    background-color: #474fa0 !important;
    color: #fff !important;
    padding: 10px !important;
    border-radius: 0.5rem !important;
    background: none;
    border: none; /* Remove border */
    padding: 0; /* Remove padding */
    margin: 0; /* Remove margin */
    font: inherit; /* Inherit font styles */
    cursor: pointer; /* Add cursor pointer */
    outline: none;
}
.details{
    margin-bottom: 3rem;

}

.details p{
    display: inline;
    font-size: 1.6rem !important;
    font-weight: 600 !important;
    color: var(--main-color) !important;
    margin:0.2rem 0 0.5rem
}
button:hover{
    background: var(--main-color) !important
}
input{
    border:1px solid #474fa0
    border-radius: 5px
}
input,textarea{

    display:flex
}
    </style>
 --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .slider {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .slider img {
            width: 100%;
            height: auto;
            display: none;
        }

        .slider img.active {
            display: block;
            animation: fade 0.8s;
        }

        @keyframes fade {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .btn-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-nav:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .left {
            left: 10px;
        }

        .right {
            right: 10px;
        }

        /* Improved Button Styles */
        .btn-nav {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-nav:hover {
            background-color: #45a049; /* Darker Green */
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
                margin: 30px auto;
                padding: 10px;
            }

            .slider img {
                max-width: 100%;
            }

            .btn-nav {
                font-size: 20px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="slider">
            <img class="active" src="https://images.unsplash.com/photo-1559467713-f830ec30e3e4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80">
            <img src="https://images.unsplash.com/photo-1590634875887-a6a516622e2a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80">
            <img src="https://images.unsplash.com/photo-1590664216212-62e763768cae?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80">
        </div>
        <div class="cont-btn">
            <button class="btn-nav left">←</button>
            <button class="btn-nav right">→</button>
        </div>
    </div>

    <script>
        const items = document.querySelectorAll('.slider img');
        const nbSlide = items.length;
        const suivant = document.querySelector('.right');
        const precedent = document.querySelector('.left');
        let count = 0;

        function slideSuivante() {
            items[count].classList.remove('active');

            if (count < nbSlide - 1) {
                count++;
            } else {
                count = 0;
            }

            items[count].classList.add('active');
        }

        suivant.addEventListener('click', slideSuivante);

        function slidePrecedente() {
            items[count].classList.remove('active');

            if (count > 0) {
                count--;
            } else {
                count = nbSlide - 1;
            }

            items[count].classList.add('active');
        }

        precedent.addEventListener('click', slidePrecedente);

        function keyPress(e) {
            if (e.keyCode === 37) {
                slidePrecedente();
            } else if (e.keyCode === 39) {
                slideSuivante();
            }
        }

        document.addEventListener('keydown', keyPress);
    </script>
</body>
</html>
@endsection




