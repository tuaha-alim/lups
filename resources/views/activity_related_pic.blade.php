@extends('layouts.frontend.app')

@push('css')

@endpush

@section('content')
    <section class="gallery_banner">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="banner_content">
                    <h1>{{$activity_Gallery->name}}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="gallery_album_section">
        <div class="container">
            <div class="row portfolio_items">




                @foreach($activity_Gallery->galleries as $gallery)

                <div class="col-lg-4 col-md-6 col-sm-6 grid-item single_item" >
                @php  $idd = base64_encode($gallery->id)  @endphp

                    <a href="{{route('activitis_gallery_album',$idd)}}">
                        <div class="single_album_img">
                            <img class="lazyload" src="{{url('storage/photo_gallery',$gallery->image)}}" alt="">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <h2>{{$gallery->name}}</h2>
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