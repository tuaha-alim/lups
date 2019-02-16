@extends('layouts.backend.app')


@push('css')



@endpush

@section('content')
    <section class="forms">
        <div class="container-fluid">
            <div class="line"></div>



                <!-- Basic Form-->
            <div class="card">

                    {!! Form::open(['route' => 'admin.photo_gallery.store', 'method' => 'POST', 'files' => true, 'data-parsley-validate'=>'']) !!}



                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Add Photo Gallery</h3>
                        </div>
                        <div class="card-body">

                            <div class="line"></div>
                            <div class="form-group row">
                                {{ Form::label('activity_id', 'LUPS Activity',['class' => 'col-sm-3 form-control-label']) }}
                                <div class="col-sm-9">
                                    {{ Form::select('activity_id',$activity, null, array('class' => 'form-control mb-3','required'=>'','placeholder'=>'Select Activity')) }}

                                    @if (count($errors) > 0)
                                        <span style="color:red">
                                 {!! $errors->first('activity_id') !!}

                         </span>
                                    @endif

                                </div>
                            </div>


                            <div class="line"></div>
                            <div class="form-group row ">

                                {{ Form::label('image', 'Cover Image',['class' => 'col-sm-3 form-control-label']) }}
                                <div class="col-sm-9">
                                {{ Form::file('image',array('class' => 'form-control-file')) }}

                                    @if (count($errors) > 0)
                                        <span style="color:red ; display: block">

                                            {!! $errors->first('image') !!}
                                        </span>
                                        <br>
                                    @endif
                                </div>

                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                {{ Form::label('gallery_name', 'Photo Gallery Title',['class' => 'col-sm-3 form-control-label']) }}
                                <div class="col-sm-9">
                                {{ Form::text('gallery_name', null, array('class' => 'form-control','required'=>'','placeholder'=>'Title')) }}
                                    @if (count($errors) > 0)
                                        <span style="color:red ; display: block">

                                            {!! $errors->first('gallery_name') !!}
                                   </span>
                                        <br>
                                    @endif

                            </div>


                            </div>
                            <div class="line"></div>
                            <div class="form-group row ">

                                {{ Form::label('album_image', 'Album Image',['class' => 'col-sm-3 form-control-label']) }}
                                <div class="col-sm-9">
                                    {{ Form::file('album_image[]',array('multiple'=>'multiple','class' => 'form-control-file'))}}

                                    @if (count($errors) > 0)
                                        <span style="color:red ; display: block">

                                            {!! $errors->first('album_image.*') !!}
                                        </span>
                                        <br>
                                    @endif
                                </div>

                            </div>


                            <div class="line"></div>
                            <div class="form-group row">
                                {{ Form::label('name', 'Pic Owner Name',['class' => 'col-sm-3 form-control-label']) }}
                                <div class="col-sm-9">
                                    {{ Form::text('name', null, array('class' => 'form-control','required'=>'','placeholder'=>'Pic Owner Name')) }}
                                    @if (count($errors) > 0)
                                        <span style="color:red ; display: block">

                                            {!! $errors->first('name') !!}
                                   </span>
                                        <br>
                                    @endif

                                </div>


                            </div>


                            <div class="line"></div>
                            <div class="form-group row">
                                {{ Form::label('date', 'Date',['class' => 'col-sm-3 form-control-label']) }}
                                <div class="col-sm-9">
                                    {{ Form::date('date', null, array('class' => 'form-control','required'=>'')) }}
                                    @if (count($errors) > 0)
                                        <span style="color:red ; display: block">

                                            {!! $errors->first('date') !!}
                                   </span>
                                        <br>
                                    @endif

                                </div>


                            </div>





                            <div class="form-group">

                                {{ Form::submit('Add Photo Gallery', array('class' => 'btn btn-primary')) }}
                            </div>






                        </div>






                <!-- Form Elements -->




        </div>
        </div>
    </section>
@endsection

@push('js')



@endpush
