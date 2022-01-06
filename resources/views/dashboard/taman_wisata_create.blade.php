@extends('layouts/dashboard')

@section('title', 'Dashboard')

@section('content')
    <style>
        .bg-image-thumb {
            height: 175px;
            background-color: rgb(85, 89, 92);
        }

        #images-preview .mb-3 {
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
                    <form class="users" action="/dashboard/taman-wisata/create" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="title" class="form-label">title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="input your title here..">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="simple_location" class="form-label">simple_location</label>
                                <input type="text" name="simple_location" class="form-control" id="simple_location" placeholder="input your simple_location here..">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="excerpt" class="form-label">excerpt</label>
                                <input type="text" name="excerpt" class="form-control" id="excerpt" placeholder="input your excerpt here..">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control" id="thumbnail" placeholder="input your thumbnail here..">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="description" class="form-label">description</label>
                                <textarea type="text" name="description" class="form-control" id="description" placeholder="input your description here..">
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="maps" class="form-label">maps <b>( harus berbentuk iframe gmaps )</b> </label>
                                <input type="text" name="maps" class="form-control" id="maps" placeholder="input your maps here..">
                                <div id="maps-show"></div>
                            </div>
                        </div>
                        <div class="form-group" id="images-preview">
                            <div class="form-group">
                                <button class="btn btn-success" type="button" id="add-images">Add More Images + </button>
                                <button class="btn btn-success" type="button" id="add-images-link">Add More Images Link + </button>
                            </div>
                            <label for="images" class="form-label">images</label>
                            <div class="mb-3">
                                <input type="file" name="images[]" class="form-control" id="images" placeholder="input your images here..">
                                <div class="ml-2 btn btn-danger" id="btn-delete-more">-</div>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="imageslink[]" class="form-control" id="imageslink" placeholder="input your images here..">
                                <div class="ml-2 btn btn-danger" id="btn-delete-more-link">-</div>
                            </div>
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

    <script>
        $("#add-images").on('click', function() {
            $("#images-preview").append(`
                <div class="mb-3">
                    <input type="file" name="images[]" class="form-control" id="images" placeholder="input your images here..">
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

        $(document).on('click','#btn-delete-more',function(){
            $(this).parent().remove()
        });

        $(document).on('click','#btn-delete-more-link',function(){
            $(this).parent().remove()
        });

        $("#maps").on('input', function(e) {
            $('#maps-show').html(e.target.value)
        })
    </script>
@endsection
    