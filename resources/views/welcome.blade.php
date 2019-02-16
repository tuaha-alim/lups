
@extends('layouts.frontend.app')
@section('title','LUPS Home Page')



@push('css')

@endpush

@section('content')




    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">

            @foreach( $sliders as $slider )
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">

            @foreach( $sliders as $slider )
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{url('storage/slider/'.$slider->image)}}" alt="{{$slider->name}}">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section class="submition_section">
        <div class="container">
            <h4>Mind's Eye 6 <br> <span>Call for Entry</span></h4>
            <a href="submition.html">Photo Submition</a>
        </div>
    </section>


    <div class="about_sec">
        <div class="container">
            <div class="row wow bounceInDown" data-wow-duration="2s">
                <h2 class="head_line">Welcome To <span>LUPS</span> </h2>
                <p>Leading University (LUPS) is here to bring together those who are interested in helping each other to produce better pictures, as well as to Educate, Encourage and Expand the photographic knowledge and capabilities of its members. We are a place where people are not judged by their skills, rather they have to come up with enthusiasm, and rest we help them in building their dreams. We are not a platform to outdo one another. We aren’t in the business of identifying the best amongst the rest.The Club is open to the people of all ages who share an undying passion for photography and wish to capture the world through their eyes. The Club's purpose is to help student understand the Art and Science behind capturing surreal pictures through various Workshops, Exhibitions, Photography Tours, Review Sessions and Photo Walks, which would be mentored by Top professional photographers. LUPS promises each member that they will surely learn and know their potential in photography. LUPS also promises to provide a platform to showcase the photography skills of its members to the world through the means of various exhibitions and e-magazines. So what are you waiting for? Join the journey to creative and mind boggling picture capturing with LUPS!</p>
            </div>
        </div>
    </div>



    <section class="sec_team">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="teamy-team scroller">
                        <div class="scroller__box">
                            <div class="col-sm-6 col-md-4 col-lg-3 scroller__item wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                                <div class="teamy teamy_mask-triangle teamy_zoom-rotate-photo">
                                    <div class="teamy__layout">
                                        <div class="teamy__preview">
                                            <img src="{{url('frontend/img/ragibali.jpg')}}" class="teamy__avatar" alt="The demo photo">
                                        </div>
                                        <div class="team_description">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                                        </div>
                                    </div>
                                    <div class="teamy__content">
                                        <span class="teamy__name">Danobir Dr. Syed Ragib Ali</span>
                                        <span class="teamy__post">Founder & Chairman, Board of Trustees, Leading University, Sylhet</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 scroller__item wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".6s">
                                <div class="teamy teamy_mask-triangle teamy_zoom-photo">
                                    <div class="teamy__layout">
                                        <div class="teamy__preview">
                                            <img src="{{url('frontend/img/vc.jpg')}}" class="teamy__avatar" alt="The demo photo">
                                        </div>
                                        <div class="team_description">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                                        </div>
                                    </div>
                                    <div class="teamy__content">
                                        <span class="teamy__name">Professor Dr. Md. Qumruzzaman Chowdhury</span>
                                        <span class="teamy__post">Vice Chancellor</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 scroller__item wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".9s">
                                <div class="teamy teamy_mask-triangle teamy_zoom-rotate-photo">
                                    <div class="teamy__layout">
                                        <div class="teamy__preview">
                                            <img src="frontend/img/shahalom.jpg" class="teamy__avatar" alt="The demo photo">
                                        </div>
                                        <div class="team_description">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                                        </div>
                                    </div>
                                    <div class="teamy__content">
                                        <span class="teamy__name">Major (Rtd) Md. Shah Alam, Psc</span>
                                        <span class="teamy__post">Registrar</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 scroller__item wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.2s">
                                <div class="teamy teamy_mask-triangle teamy_zoom-slide-photo">
                                    <div class="teamy__layout">
                                        <div class="teamy__preview">
                                            <img src="frontend/img/advisers/iffat.jpg" class="teamy__avatar" alt="The demo photo">
                                        </div>
                                        <div class="team_description">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                                        </div>
                                    </div>
                                    <div class="teamy__content">
                                        <span class="teamy__name">Iffat Jahan Choudhury</span>
                                        <span class="teamy__post">Advisor</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <section class="activiti_sec">
        <div id="" class=" section-text-over-media section-text-over-image  has-text ">
            <div class="text text-over-media-inner head_sec position">
                <div class="container">
                    <h2 class="head_line"><span>LUPS</span> Activities</h2>
                    <div class="row">
                        @foreach($ativitries as $ativity)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <a href="{{route('activitis_gallery',$ativity->name)}}">
                                <div class="activiti_box hvr-underline-from-center wow bounceInLeft" data-wow-duration="2s">
                                    <img src="{{url('storage/lups_activitries',$ativity->image)}}">
                                    <h3>{{$ativity->name}}</h3>
                                    <p>{{$ativity->description}}</p>
                                </div>
                            </a>
                        </div>
                            @endforeach

                    </div>
                </div>
            </div>
            <div class="background-overlay"></div>
            <div class="section-background section-background-fixed">
                <picture class="section-background-image text-over-media-background-image">
                    <img src="frontend/img/Anirban sengupta_1_bba_winter morning_ 01737-757656.jpg.jpg" data-object-fit="cover" data-autoscale-content-ratio="1.77777777778">
                </picture>
            </div>
        </div>
    </section>
    <section class="section_gellary">
        <!--Start Header-->
        <div class="container-fluid">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="PhotoHeader">
                    <div class="PhotoHeaderContent">
                        <div class="Container">
                            <div class="PhotoPar">
                                Photos
                                <i class="fa fa-image"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="frontend/img/picnic.jpg">
                    </div>
                    <div class="item">
                        <img src="frontend/img/picnic2.jpg">
                    </div>
                    <div class="item">
                        <img src="frontend/img/picnic3.jpg">
                    </div>
                    <div class="item">
                        <img src="frontend/img/picnic2.jpg">
                    </div>
                </div>
            </div>
        </div>

        <!--End Slider-->
    </section>





    <section class="workshop_partners_area">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h2 class="head_line">Workshop and Exihibtion <span>Partners</span></h2>
                </div>
            </div>
            <br><br>
            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single_partners">
                        <img src="frontend/img/alliance_art.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single_partners">
                        <img src="frontend/img/Big Logo.png" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single_partners">
                        <img src="frontend/img/sylheti_wedding.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single_partners">
                        <img src="frontend/img/metro logo png.png" alt="">
                    </div>
                </div>

            </div>
        </div>
    </section>



    <section class="street">
        <div id="" class=" section-text-over-media section-text-over-image  has-text ">
            <div class=" text-over-media-inner head_sec pad">
                <div class="container">
                    <div class="row wow fadeInRightBig" data-wow-duration="2s">
                        <h2>Workshop On Street Photograph</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                        <span>Organized: Iftekhar Adnan Photography. Date: August 15, 2018. Time: 8.00AM to 1.00PM.</span>
                    </div>
                </div>
            </div>
            <div class="background-overlay"></div>
            <div class="section-background section-background-fixed">
                <picture class="section-background-image text-over-media-background-image">
                    <img src="frontend/img/street.jpg" data-object-fit="cover" data-autoscale-content-ratio="1.77777777778">
                </picture>
            </div>
        </div>
    </section>


@endsection

@push('js')


@endpush