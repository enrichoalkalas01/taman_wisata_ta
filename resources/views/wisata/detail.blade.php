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
            background-color: rgba(25,25,25,0.25);
            display: flex;
            justify-content: flex-start;
            align-items: flex-end;
            padding: 0;
        }

        #banner .wrapper-box {
            width: 100%;
            padding: 10px 20px;
            background-color: rgba(1,1,1, 0.8);
            color: #fff;
            text-align: left;
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

        #slider-detail .image-box {
            padding: 0 10px;
        }

        #slider-detail .image-bg {
            /* width: 100%; */
            height: 100px;
            background-color: #dedede;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            cursor: pointer;
        }

        #slider-detail .slick-arrow {
            position: absolute;
            top: 50%;
            transform: translate(-50%, -50%);
            cursor: pointer;
        }

        #slider-detail .slick-prev  {
            left: -5px;
        }

        #slider-detail .slick-next  {
            right: -15px;
        }

        #fasilitas-wisata {
            padding: 2.5%;
        }

        #fasilitas-wisata ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            /* grid-template-rows: 50%; */
            grid-template-columns: 50%;
            /* grid-auto-rows: 50%; */
        }

        #fasilitas-wisata ul li {
            
        }
    </style>
    <div id="banner">
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <div class="wrapper-box">
                    <h2>Welcome to our website</h2>
                    <p>This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="content" class="container-fluid">
        <!-- <div class="row">
            <div class="col-md-12 p-3 text-center">
                <h2>Rekomendasi tempat wisata</h2>
            </div>
        </div> -->
        <div class="row" style="padding: 2.5% 5%;">
            <div id="slider-detail" class="col-md-12">
                <div class="image-box">
                    <div class="image-bg" style="background-image: url('https://anekatempatwisata.com/wp-content/uploads/2014/10/Raja-Ampat.jpg')"></div>
                </div>
                <div class="image-box">
                    <div class="image-bg" style="background-image: url('https://ecs7.tokopedia.net/blog-tokopedia-com/uploads/2018/11/candi-borobudur.jpg')"></div>
                </div>
                <div class="image-box">
                    <div class="image-bg" style="background-image: url('https://cdn.idntimes.com/content-images/post/20210602/padar-2e097c2b4aa2ea93fe57634a9c51a46d_600x400.jpg')"></div>
                </div>
                <div class="image-box">
                    <div class="image-bg" style="background-image: url('https://www.harapanrakyat.com/wp-content/uploads/2019/11/tempat-wisata-di-Indonesia.jpg')"></div>
                </div>
            </div>
        </div>
        <div class="row" id="wrapper-desc">
            <div class="col-sm-12 col-md-6 left-box">
                Tester
            </div> 
            <div class="col-sm-12 col-md-6 right-box">
                <div class="row wrapper-rb">
                    <div class="col-md-6" id="fasilitas-wisata">
                        <h4>Fasilitas</h4>
                        <ul>
                            <li>
                                <span>()</span>
                                <span>WIFI</span>
                            </li>
                            <li>
                                <span>()</span>
                                <span>WIFI</span>
                            </li>
                            <li>
                                <span>()</span>
                                <span>WIFI</span>
                            </li>
                            <li>
                                <span>()</span>
                                <span>WIFI</span>
                            </li>
                        </ul>
                        
                    </div>
                    <div class="col-md-6" id="lokasi-wisata">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3598.9807831871963!2d109.41164882963571!3d-7.773254635826434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6531a391120f65%3A0x5a377b098ce34660!2sPantai%20Menganti%20Kebumen!5e0!3m2!1sid!2sid!4v1641389825587!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#slider-detail').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            centerPadding: '50px',
            prevArrow: `<i class="slick-prev fas fa-angle-left"></i>`,
            nextArrow: `<i class="slick-next fas fa-angle-right"></i>`,
            responsive: [
                {
                    breakpoint: 1080,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 475,
                    settings: {
                        slidesToShow: 1
                    }
                },
            ]
        });

        $('.image-bg').on('click', (e) => {
            e.preventDefault();
            // e.target.getAttribute('style')
            $('#banner .jumbotron').attr('style', `${ e.target.getAttribute('style') }`)
        })
    </script>
@endsection
    