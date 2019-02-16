@extends('layouts.frontend.app')
@section('title','About')
@push('css')
@endpush

@section('content')

    <section class="about_section_top">
        <div class="container-fluid">
            <div class="row">
                <div class="about_studio">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="studio_image">
                                <img src="frontend/img/about-picture.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="studio_content">
                                <h3>About Our <span>Studio</span></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam congue eu elit eget id, tristique ultricies tellus. Donec cursus convallis nunc eu gravida. In at aliquet metus etiam cursus in libero eget iaculis. Duis dictum non massa nec a eget eleifend. Mauris dapibus, orci eu sodales venenatis, dui leo semper magna, et auctor metus  vulputate convallis massa, non lobortis mi auctor sit amet. Nullam nec sem ac eros lacinia euismod. Nam nec ex vel eros tus etiam cursus in libero convallis viverra.</p>

                                <p>Quisque nec tincidunt velit. Nulla lectus lacus, ultricies sed orci sed, rutrum efficitur velit. Proin eget gravida turpis. Aenean quis nibh sit amet purus malesuada varius  donec mauris diam, blandit vel neque vitae, malesuada vulputate metus aenean est ligula id elit gravida varius. Nunc imperdiet ante in est volutpat, fermentum ac rutrum lorem maximus. Nullam facilisis nisi ipsum, a tempor elit porttitor quis.</p>
                                <a href="#">Contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="about_message">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="messanger_img">
                        <img src="frontend/img/MPU-Mann.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="owner_msg">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam congue eu elit eget id, tristique ultricies tellus. Donec cursus convallis nunc eu gravida. In at aliquet metus etiam cursus in libero eget iaculis. Duis dictum non massa nec a eget eleifend. Mauris dapibus, orci eu sodales venenatis, dui leo semper magna, et auctor metus  vulputate convallis massa, non lobortis mi auctor sit amet. Nullam nec sem ac eros lacinia euismod. Nam nec ex vel eros tus etiam cursus in libero convallis viverra.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="what_do_we">
        <div class="container-fluid">
            <div class="row">
                <div class="what_we_mgs wow fadeInUp">
                    <h1>What we do</h1>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.
                    </p>
                </div>
            </div>
        </div>
    </section>



    <section class="about_section_bottom">
        <div class="row no_mr">
            <div class="col-lg-4 no_pd">
                <div class="single_images wow fadeInLeftBig" data-wow-duration="2s">
                    <img src="frontend/img/gallery/01.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-4 no_pd">
                <div class="single_images wow fadeInUp" data-wow-duration="1s">
                    <img src="frontend/img/gallery/02.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-4 no_pd">
                <div class="single_images wow fadeInRightBig" data-wow-duration="2s">
                    <img src="frontend/img/gallery/03.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

@endsection
@push('js')
@endpush