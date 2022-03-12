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
            padding-top: 0;
            padding-bottom: 0;
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
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        a {
            text-decoration: none;
            color: unset;
        }

        a:hover {
            color: unset;
        }

        .links-page {
            padding: 2.5% 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .links-page nav {
            width: auto;
        }
    </style>
    <div id="banner">
        <div class="jumbotron jumbotron-fluid" style="margin: 0;">
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
                    <div class="col-md-12 text-center">
                        <h2>Rekomendasi tempat wisata</h2>
                    </div>
                </div>
                <div class="row" style="padding: 2.5% 10%">
                    <form class="col-md-12 d-flex justify-center d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <!-- <div class="row wrapper-search"> -->
                            <div class="row input-group mb-3">
                                <input class="col-11" type="text" name="query" style="border: 1px solid #dedede !important;" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="col-1 input-group-append">
                                    <button class="btn btn-primary" type="submit" id="search-btn">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="row">
                                        <label for="rating" class="form-label col-3">Rating : </label>
                                        <div class="col-9">
                                            <select name="rating" class="form-control w-100">
                                                <option value="">default</option>
                                                <option value="sangat bagus">sangat bagus</option>
                                                <option value="bagus">bagus</option>
                                                <option value="normal">normal</option>
                                                <option value="tidak bagus">tidak bagus</option>
                                                <option value="sangat tidak bagus">sangat tidak bagus</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="row">
                                        <label for="location" class="form-label col-4">Location : </label>
                                        <div class="col-8">
                                            <select name="location" class="form-control w-100">
                                                <option value="">default</option>
                                                @foreach($DataSL as $simple_location)
                                                    <option value="{{ $simple_location->name_location }}">{{ $simple_location->name_location }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="row">
                                        <label for="price" class="form-label col-3">Price : </label>
                                        <div class="col-9">
                                            <select name="price" class="form-control w-100">
                                                <option value="">default</option>
                                                <option value="{{ $HighPrice }}">harga tertinggi</option>
                                                <option value="{{ $LowPrice }}">harga terendah</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- </div> -->
                    </form>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @for($i = 0; $i < count($data_taman); $i++)
                        <div class="col">
                            <a href="/tempat-wisata/detail/{{ $data_taman[$i]->id }}">
                                <div class="card shadow-sm">
                                    <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#55595c"></rect>
                                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                    </svg> -->
                                    @if( $data_taman[$i]->thumbnail == NULL )
                                        <div class="bd-placeholder-img card-img-top bg-image-thumb"></div>
                                    @else
                                        <div class="bd-placeholder-img card-img-top bg-image-thumb"
                                            style="background-image: url('{{ asset('storage/images/' . $data_taman[$i]->thumbnail) }}')"
                                        ></div>
                                    @endif
                                    <div class="card-body">
                                        <div class="card-text">
                                            <h4>{{ $data_taman[$i]->title }}</h4>
                                        </div>
                                        <p class="card-text">
                                            {{ $data_taman[$i]->excerpt }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">{{ $data_taman[$i]->simple_location }}</small>
                                                <!-- <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </div> -->
                                            <small class="text-muted">{{ $data_taman[$i]->created_at }}</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endfor
                </div>
                <div class="row links-page">
                    {{ $data_taman->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        const getCurrentLocation = () => {
            var getPosition = {
                enableHighAccuracy: false,
                timeout: 9000,
                maximumAge: 0
            };
            
            // Your Current Position Here
            function success(gotPosition) {
                var uLat = gotPosition.coords.latitude;
                var uLon = gotPosition.coords.longitude;
                console.log(`${uLat}`, `${uLon}`);
            };
            
            function error(err) {
                console.warn(`ERROR(${err.code}): ${err.message}`);
            };
            
            navigator.geolocation.getCurrentPosition(success, error, getPosition);
        }

        // getCurrentLocation()
    </script>
@endsection
    