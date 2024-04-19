








            @extends('layouts.app')


            @section('title')
                Admin ajouter
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
                                <a  href="{{ route('voiture.index') }}"><i class="fas fa-car"></i>
                                    <p>voiture</p>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('cat.show') }}"><i class="fas fa-list-ul"></i>
                                    <p>categorie</p>
                                </a>
                            </li>


                            <li>
                                <a class="active" href="{{ route('voiture.create') }}"><i class="fa fa-plus" aria-hidden="true"></i>
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

                    <div class="content ">
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
                            <p>Ajouter une voiture</p>
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="data-info">


                                <div class="info">
                                    <form action="{{ route('voiture.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class='card-body '>
                                            <div class="">
                                                <label for="name">Nom De Voiture</label>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="entrer le nom ">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="description">Description De Voiture</label>
                                                <textarea class="form-control" name="description"></textarea>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="price">Prix De Location ($) </label>
                                                    <input type="number" name="price" class="form-control" placeholder="entrer le prix">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <h5>Choisit La Categorie<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category" id="" class="form-control" required>
                                                        <option value="" selected disabled>Choisit La Category</option>
                                                        @foreach ($cats as $row)
                                                            <option value="{{ $row->cat_name }}">{{ $row->cat_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <br>
                                                    <div class="form-group">
                                                        <label>Ajouter Des Photo De Voiture</label>
                                                        <input type="file" name="image1" class="form-control" id="image1">
                                                        <input type="file" name="image2" class="form-control" id="image2">
                                                        <input type="file" name="image3" class="form-control" id="image3">
                                                        <input type="file" name="image4" class="form-control" id="image4">
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <img id="showImage1" src="{{ url('upload/no_image.jpg') }}"
                                                            style="width:100px;height:100px">
                                                            <img id="showImage2" src="{{ url('upload/no_image.jpg') }}"
                                                            style="width:100px;height:100px">
                                                            <img id="showImage3" src="{{ url('upload/no_image.jpg') }}"
                                                            style="width:100px;height:100px">
                                                            <img id="showImage4" src="{{ url('upload/no_image.jpg') }}"
                                                            style="width:100px;height:100px">
                                                    </div>
                                                    <br>
                                                    <div class="form-group text-center">
                                                        <button style="background-color: #512aa5" class="btn text-light"
                                                            type="submit">Sauvegarder</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                        </div>

                        </div>

                    </div>
                </section>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#image1').change(function(e) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#showImage1').attr("src", e.target.result);
                            }
                            reader.readAsDataURL(e.target.files["0"]);
                        });
                    });

                    $(document).ready(function() {
                        $('#image2').change(function(e) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#showImage2').attr("src", e.target.result);
                            }
                            reader.readAsDataURL(e.target.files["0"]);
                        });
                    });

                    $(document).ready(function() {
                        $('#image3').change(function(e) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#showImage3').attr("src", e.target.result);
                            }
                            reader.readAsDataURL(e.target.files["0"]);
                        });
                    });

                    $(document).ready(function() {
                        $('#image4').change(function(e) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#showImage4').attr("src", e.target.result);
                            }
                            reader.readAsDataURL(e.target.files["0"]);
                        });
                    });
                </script>

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
                        height: 160vh !important;
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

                    .info{
                        margin-left: 20% !important
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
                    .price ,.accepte,.refuse,.complete,.modifier,.supprimer,.vendu{
                        border-radius: 6px;
                        padding: 8px !important;
                        color:white
                    }
                    .vendu{
                        background-color: #ff8800;
                    }

                    .supprimer{
                        background: #a80000;
                    }
                    .modifier{
                        background-color: gray;
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
