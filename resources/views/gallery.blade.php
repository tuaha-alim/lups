<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LUPS</title>
    <link rel="icon" type="image/png" href="img/mrslogotitle.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.css">
    <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Supermercado+One" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/loaders.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<nav class=" navbar navbar-fixed-top " >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-header nav-1-header">
                    <button type="button" class="navbar-toggle navbar-button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar "></span>
                        <span class="icon-bar "></span>
                        <span class="icon-bar "></span>
                    </button>
                    <a class="logo" href="#"><img src="frontend/img/logolups.png"></a>
                </div>
                <div class="navbar-collapse collapse menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="{{route('/')}}">Home</a></li>
                        <li><a href="{{route('about')}}">About</a></li>
                        <li><a href="{{route('gallery')}}">Gallery</a></li>
                        <li><a  href="{{route('activitis')}}">Activitis</a></li>
                        <li><a  href="{{route('send_photo.create')}}">Send Photo</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>


<section class="gallery_banner">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="banner_content">
                <h1>lups gallery</h1>
            </div>
        </div>
    </div>
</section>

<section class="gallery_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading">
                    <h1>event name is here</h1>
                </div>
            </div>
        </div>
        <div class="row grid">

            @if(!empty($gallery))
                @forelse($gallery as $key =>$pic)


                    <div class="col-lg-3 grid-item">
                            <div class="single_img">
                                <div class="gallery_overlay"></div>
                                <div class="content">
                                    <h3><span><i class="fa fa-camera-retro" aria-hidden="true"></i> : </span>{{$pic->title}}</h3>
                                    <p><span><i class="fa fa-calendar" aria-hidden="true"></i> : </span> {{$pic->date}}</p>
                                    <a href="{{ url('storage/picture/'.$pic->image)}}" data-lightbox="mygallery" data-title="Caption One"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                </div>
                                <img src="{{ url('storage/picture/'.$pic->image)}}" alt="">
                            </div>
                        </div>

                @empty
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading">
                                <h1>Empty Picture</h1>
                            </div>
                        </div>
                    </div>

                @endforelse
            @endif


        </div>
    </div>

</section>




<footer class="footer_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_content text-center">
                    <ul>
                        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                    <p>&copy; 2019 by The Art of Photography. Proudly created with Nevadiatechnology.com</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
<script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.lazy.min.js')}}"></script>
<script src="{{asset('frontend/js/lightbox.min.js')}}"></script>
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>



</body>
</html>