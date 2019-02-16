
@extends('layouts.frontend.app')




@push('css')

@endpush

@section('content')


    <section class="gallery_banner">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="banner_content">
                    <h1>Mind's Eye International Photography Exhibition</h1>
                </div>
            </div>
        </div>
    </section>



    <section class="gallery_section">
        <div class="container-fluid">
            <div class="row grid portfolio_items">
                @foreach($activity_Gallery_album->albums as $album)

                <div class="col-lg-3 col-md-4 col-sm-6 grid-item single_item">
                    <a href="{{url('storage/photoAlbum',$album->album_image)}}" data-lightbox="mygallery" data-title="Caption One">
                        <div class="single_img">
                            <div class="gallery_overlay"></div>
                            <div class="content">
                                <h3><span><i class="fa fa-camera-retro" aria-hidden="true"></i> : </span>{{$album->name}}</h3>
                                <p><span><i class="fa fa-calendar" aria-hidden="true"></i> : </span> {{$album->date}}</p>
                            </div>
                            <img class="lazyload" src="{{url('storage/photoAlbum',$album->album_image)}}" alt="">
                            <i class="fa fa-search-plus" aria-hidden="true"></i>
                        </div>
                    </a>
                </div>
                @endforeach





            </div>
        </div>
    </section>


@endsection

@push('js')


@endpush