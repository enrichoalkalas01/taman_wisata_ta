@extends('layouts/admin/dashboard')

@section('title', 'Dashboard')

@section('content')
    <style>
        .bg-image-thumb {
            height: 175px;
            background-color: rgb(85, 89, 92);
        }

        #images-preview .mb-3,
        #fasilitas-preview .mb-3 {
            display: flex;
        }

        #maps-show {
            padding: 25px 10px;
        }
        
        iframe {
            width: 100%;
        }
    </style>
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-3 text-center">
                <h2>Rekomendasi tempat wisata here</h2>
            </div>
        </div>
    </div>

    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-2">
                <a class="btn btn-primary" href="/dashboard/taman-wisata">Back</a>
            </div>
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Create Data For Taman Wisata</h6>
                    </div>
                    <div class="card-body" style="width: 100%;">
                    <form class="users" action="/dashboard/admin/taman-wisata/edit" method="post" enctype="multipart/form-data">
                        @csrf
                        <input name="taman_id" value="{{ $data_taman->id }}" style="display: none;" />
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="title" class="form-label">title</label>
                                <input value="{{ $data_taman->title }}" type="text" name="title" class="form-control" id="title" placeholder="input your title here..">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="simple_location" class="form-label">simple_location</label>
                                <input value="{{ $data_taman->simple_location }}" type="text" name="simple_location" class="form-control" id="simple_location" placeholder="input your simple_location here..">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="excerpt" class="form-label">excerpt</label>
                                <input value="{{ $data_taman->excerpt }}" type="text" name="excerpt" class="form-control" id="excerpt" placeholder="input your excerpt here..">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="price" class="form-label">price</label>
                                <input value="{{ $data_taman->price }}" type="number" name="price" class="form-control" id="price" placeholder="input your price here..">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="latitude" class="form-label">latitude</label>
                                <input value="{{ $data_taman->latitude }}" type="text" name="latitude" class="form-control" id="latitude" placeholder="input your latitude here..">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="longitude" class="form-label">longitude</label>
                                <input value="{{ $data_taman->longitude }}" type="text" name="longitude" class="form-control" id="longitude" placeholder="input your longitude here..">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">thumbnail</label>
                                <input placeholder="{{ $data_taman->thumbnail }}" defaultValue="{{ $data_taman->thumbnail }}" value="{{ $data_taman->thumbnail }}" type="file" name="thumbnail" class="form-control" id="thumbnail" placeholder="input your thumbnail here..">
                                <input name="exist_thumbnail" value="{{ $data_taman->thumbnail }}" style="display: none;" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="rating" class="form-label">rating</label>
                                <div class="mb-3">
                                    <select value="{{ $data_taman->rating }}" name="rating" class="form-control mr-2 col-md-12 col-sm-12">
                                        <option value="sangat bagus">sangat bagus</option>
                                        <option value="bagus">bagus</option>
                                        <option value="normal">normal</option>
                                        <option value="tidak bagus">tidak bagus</option>
                                        <option value="sangat tidak bagus">sangat tidak bagus</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="description" class="form-label">description</label>
                                <textarea type="text" name="description" class="form-control" id="description" placeholder="input your description here..">{{ $data_taman->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group" id="fasilitas-preview">
                            <div class="form-group">
                                <button class="btn btn-success" type="button" id="add-fasilitas">Add More Facility + </button>
                            </div>
                            <label for="fasilitas" class="form-label">fasilitas</label>
                            @foreach($data_fasilitas as $value)
                                <div class="mb-3">
                                    <select value="{{ $value->name_icon }}" name="fasilitas_icon[]" class="form-control mr-2 col-md-2 col-sm-12" defaultValue="{{ $value->name_icon }}">
                                        <option value="fas fa-home">Icon home</option>
                                        <option value="fas fa-wifi">Icon wifi</option>
                                        <option value="fas fa-restroom">Icon toilet</option>
                                        <option value="fas fa-road">Icon road</option>
                                        <option value="fas fa-camera">Icon foto</option>
                                        <option value="fas fa-shopping-cart">Icon market</option>
                                        <option value="fas fa-running">Icon run</option>
                                        <option value="fas fa-dumbbell">Icon gym</option>
                                        <option value="fas fa-volleyball-ball">Icon ball</option>
                                        <option value="fab fa-simplybuilt">Icon playground</option>
                                        <option value="fas fa-star-and-crescent">Icon tempat_ibadah</option>
                                        <option value="fas fa-layer-group">Icon other</option>
                                    </select>
                                    <input value="{{ $value->title_fasilitas }}" type="text" name="fasilitas_text[]" class="form-control" id="fasilitas" placeholder="input your fasilitas here..">
                                    <div class="ml-2 btn btn-danger" id="btn-delete-more">-</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="maps" class="form-label">maps <b>( harus berbentuk iframe gmaps )</b> </label>
                                <input value="{{ $data_taman->maps }}" type="text" name="maps" class="form-control" id="maps" placeholder="input your maps here..">
                                <div id="maps-show"></div>
                            </div>
                        </div>
                        <div class="form-group" id="images-preview">
                            <div class="form-group">
                                <button class="btn btn-success" type="button" id="add-images">Add More Images + </button>
                                <button class="btn btn-success" type="button" id="add-images-link">Add More Images Link + </button>
                            </div>
                            <label for="images" class="form-label">images</label>
                            @foreach($data_images as $value)
                                @if($value->type != 'imageslink')
                                    <div class="mb-3">
                                        <input value="{{ $value->type }}" type="file" name="images[]" class="form-control" id="images" placeholder="input your images here..">
                                        <div class="ml-2 btn btn-danger" id="btn-delete-more">-</div>
                                        <input id="exist" style="display: none;" class="col-md-12" value="{{ $value->name_image }}" name="exist_images[]" />
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <input value="{{ $value->name_image }}" type="text" name="imageslink[]" class="form-control" id="imageslink" placeholder="input your images here..">
                                        <div class="ml-2 btn btn-danger" id="btn-delete-more-link">-</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Create Data
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>$("#add-images").on('click', function() {
            $("#images-preview").append(`
                <div class="mb-3">
                    <input type="file" name="images[]" class="form-control" id="images" placeholder="input your images here..">
                    <div class="ml-2 btn btn-danger" id="btn-delete-more">-</div>
                </div>
            `)
        })

        $('#add-fasilitas').on('click', function() {
            $('#fasilitas-preview').append(`
                <div class="mb-3">
                    <select name="fasilitas_icon[]" class="form-control mr-2 col-md-2 col-sm-12">
                        <option value="fas fa-home">Icon home</option>
                        <option value="fas fa-wifi">Icon wifi</option>
                        <option value="fas fa-restroom">Icon toilet</option>
                        <option value="fas fa-road">Icon road</option>
                        <option value="fas fa-camera">Icon foto</option>
                        <option value="fas fa-shopping-cart">Icon market</option>
                        <option value="fas fa-running">Icon run</option>
                        <option value="fas fa-dumbbell">Icon gym</option>
                        <option value="fas fa-volleyball-ball">Icon ball</option>
                        <option value="fab fa-simplybuilt">Icon playground</option>
                        <option value="fas fa-star-and-crescent">Icon tempat_ibadah</option>
                        <option value="fas fa-layer-group">Icon other</option>
                    </select>
                    <input type="text" name="fasilitas_text[]" class="form-control" id="fasilitas" placeholder="input your fasilitas here..">
                    <div class="ml-2 btn btn-danger" id="btn-delete-more">-</div>
                </div>
            `)
        })

        $("#add-images-link").on('click', function() {
            $("#images-preview").append(`
                <div class="mb-3">
                    <input type="text" name="imageslink[]" class="form-control" id="imageslink" placeholder="input your images here..">
                    <div class="ml-2 btn btn-danger" id="btn-delete-more-link">-</div>
                </div>
            `)
        })

        $(document).on('change', '#images', function() {
            $(this).parent().find("#exist").remove()
        })

        $(document).on('click','#btn-delete-more',function(){
            $(this).parent().remove()
        });

        $(document).on('click','#btn-delete-more-link',function(){
            $(this).parent().remove()
        });

        let mapsValue = "{{ $data_taman->maps }}"
        
        if ( mapsValue !== null || mapsValue !== '' ) {
            $('#maps-show').html($("#maps").val())
        }

        $("#maps").on('input', function(e) {
            $('#maps-show').html(e.target.value)
        })
    </script>

    <!-- <i class="fas fa-volleyball-ball"></i> -->
    <!-- <i class="fas fa-running"></i> -->
    <!-- <i class="fas fa-dumbbell"></i> -->
    <!-- <i class="fas fa-star-and-crescent"></i> -->
    <!-- <i class="fas fa-pray"></i> -->
    <!-- <i class="fas fa-praying-hands"></i> -->
    <!-- <i class="fas fa-shopping-cart"></i> -->
    <!-- <i class="fas fa-camera"></i> -->
    <!-- <i class="fas fa-layer-group"></i> -->
    <!-- <i class="fas fa-road"></i> -->
    <!-- <i class="fab fa-simplybuilt"></i> -->
@endsection
    