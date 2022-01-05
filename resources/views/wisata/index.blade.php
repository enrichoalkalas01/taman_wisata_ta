@extends('layouts/main')

@section('title', 'Taman Wisata')

@section('content')
    <style>
        #banner .jumbotron {
            background-image: url('https://www.rentalmobilbali.net/wp-content/uploads/2016/05/10-Tempat-Wisata-Favorit-Wisatawan-Indonesia-Di-Bali-Facebook.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100%;
            height: 500px;
            box-shadow: 3px 0px 10px rgba(25,25,25, .5);
        }

        #banner .jumbotron .container-fluid {
            width: 100%;
            height: 100%;
            background-color: rgba(25,25,25,0.75);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #banner .wrapper-box {
            color: #fff;
            text-align: center;
        }

        #content-wisata .album {
            padding: 0 5%;
        }

        .bg-image-thumb {
            height: 225px;
            background-color: rgb(85, 89, 92);
        }

        a {
            text-decoration: none;
            color: unset;
        }

        a:hover {
            color: unset;
        }
    </style>
    <div id="banner">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <div class="wrapper-box">
                    <h1 class="display-4">Welcome to our website</h1>
                    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="content-wisata">
        <div class="album py-5 bg-light">
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h2>Rekomendasi tempat wisata</h2>
                </div>
                <div class="col-md-12 text-center mb-4">
                    <input placeholder="search your destination here..." />
                    <button>Search</button>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @for($i = 0; $i < 6; $i++)
                    <div class="col">
                        <a href="/tempat-wisata/detail/{{ $i }}">
                            <div class="card shadow-sm">
                                <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg> -->
                                <div class="bd-placeholder-img card-img-top bg-image-thumb">
                                    
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        <h4>Title Here..</h4>
                                    </div>
                                    <p class="card-text">
                                        This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                            <!-- <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                            </div> -->
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
            </div>
        </div>
    </div>

    <!-- <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3 text-center">
                <h2>Rekomendasi tempat wisata</h2>
            </div>
        </div>
    </div> -->
@endsection
    