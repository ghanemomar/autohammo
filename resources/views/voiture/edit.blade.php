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
                            <a href="{{ route('cat.show') }}" class="list-group-item list-group-item-action">Ajouter une
                                Categorie
                            </a>
                            <a href="{{route('voiture.index')}}" class="list-group-item list-group-item-action">Afficher Les Voitures </a>
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
                    <form action="{{ route('voiture.update',$voiture->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{$voiture->image}}">
                        <div class='card-body '>
                            <div class="form-group">
                                <label for="name">Nom de voiture</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{$voiture->name}}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="description">Description De Voiture</label>
                                <textarea class="form-control" name="description">{{$voiture->description}}</textarea>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <label for="price">Prix De Location ($) </label>
                                    <input type="number" name="price" class="form-control" value="{{$voiture->price}}">
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
                                        <label>Ajouter Une Photo De Voiture</label>
                                        <input type="file" name="image1" class="form-control" id="image1">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <img id="showImage" src="{{ asset($voiture->image) }}"
                                            style="width:100px;height:100px">
                                    </div>
                                    <br>
                                    <div class="form-group text-center">
                                        <button style="background-color: #A52A2A" class="btn text-light"
                                            type="submit">Modifier</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#image1').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr("src", e.target.result);
                    }
                    reader.readAsDataURL(e.target.files["0"]);
                });
            });
        </script>


    @endsection
