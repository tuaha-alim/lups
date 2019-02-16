@extends('layouts.backend.app')
@section('title',' Photo Gallery')
@push('css')

    <style>

        .hover_box{
            position: relative;
            z-index: 1;
        }
        .hover_box:before{
            position: absolute;
            content: "";
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background: rgba(39, 10, 255,.3);
            transform: scale(1.4);
            opacity: 0;
            transition: .3s;
        }
        .hover_box:hover:before{
            transform: scale(1);
            opacity: 1;
        }
        .del_btn {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%) scale(.3);
            border: none;
            opacity: 0;
            transition: .3s;
            border-radius: 50%;
            font-size: 30px;
            background: transparent;
            color: #f00;
        }
        .hover_box:hover .del_btn{
            transform: translate(-50%,-50%) scale(1);
            opacity: 1;
        }
    </style>



@endpush

@section('content')

    <br>
    <br>
    <br>


    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4"> Photo Album</h3>
                        </div>
                        <div class="card-body">
                          <div class="row">
                              <div class="row">
                              @foreach($Gallery->albums as $album)

                                      <div class="col-lg-3 col-sm-6 col-md-4">
                                          <br>
                                          <div class="hover_box">
                                              <img style="border: 2px solid #796aee73;border-radius: 5px;" class="img-thumbnail" src="{{ url('storage/photoAlbum/'.$album->album_image) }} ">

                                              <button class="del_btn DeleteContent" type="button"data-id="{{$album->id}}" data-name="{{$album->name}}" data-pic="{{$album->album_image}}"data-url="/admin/deleteGallery"
                                                      >
                                                  <i class="fa fa-trash" aria-hidden="true"></i>
                                                   <p style="font-size: 15px;">{{$album->date}}</p>


                                              </button>
                                               <p style="font-size: 15px">{{$album->name}}</p>




                                          </div>
                                      </div>


                                  @endforeach
                              </div>

                          </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@push('js')


   

@endpush