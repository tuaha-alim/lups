@extends('layouts.frontend.app')
@section('title','Photo Graphic Gallery')
@push('css')
    <link rel="stylesheet" href="{{asset('frontend/css/loaders.min.css')}}">
@endpush

@section('content')
    <section class="contact_section">
        <div class="container-fluid">
            <div class="row">
                <div class="contact_box">

                        {!! Form::open(['route' => 'send_photo.store', 'method' => 'POST', 'files' => true, 'data-parsley-validate'=>'']) !!}

                            <div class="form-group">
                            <label for="email">Image</label>
                            {{ Form::label('image', ' Image') }}
                            {{ Form::file('image[]',array('multiple'=>'multiple'))}}
                            @if (count($errors) > 0)
                                <br>
                                <span style="color:red;display: block">
                           {!! $errors->first('image.*') !!}
                           {!! $errors->first('image') !!}

                         </span>
                            @endif
                        </div>



                        <div class="form-group">
                            {{ Form::label('category_id', ' Categories') }}
                            {{ Form::select('category_id', $categories, null, ['class'=>'form-control','placeholder'=>'Select Category']) }}
                            @if (count($errors) > 0)
                                <br>
                                <span style="color:red ; display: block">
                           {!! $errors->first('category_id') !!}
                         </span>
                            @endif
                        </div>
                       {{ Form::label('name', ' Name') }}
                      {{ Form::text('name', null, ['placeholder'=>'Name']) }}

                        @if (count($errors) > 0)
                            <span style="color:red; display: block">
                           {!! $errors->first('name') !!}
                         </span>
                            <br>
                        @endif

                      {{ Form::label('email', ' Email') }}
                    {{ Form::text('email', null, ['placeholder'=>'Email']) }}
                        @if (count($errors) > 0)
                            <span style="color:red ; display: block">
                           {!! $errors->first('email') !!}
                         </span>
                            <br>
                        @endif







                      {{ Form::label('message', 'Message') }}
                      {{Form::textarea('message', null, ['placeholder'=>'Message'])}}
                        @if (count($errors) > 0)
                            <span style="color:red ; display: block">
                           {!! $errors->first('message') !!}
                                <br>
                                <br>
                         </span>
                        @endif

                        {{ Form::submit('Submit Photo', array('class' => 'btn btn-primary')) }}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </section>




@endsection
@push('js')
    <script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.lazy.min.js')}}"></script>
    <script src="{{ asset('backend/js/sweetalert2.all.min.js') }}"></script>

        @if(session('successMsg'))
            <script>
                Swal({
                    position: 'middle',
                    type: 'success',
                    title: 'photo send successfully',
                    showConfirmButton: false,
                    timer: 1200

                }).then(function () {
                    window.location.reload();
                })
            </script>

        @endif
@endpush