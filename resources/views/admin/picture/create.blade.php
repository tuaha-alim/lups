@extends('layouts.backend.app')


@push('css')



@endpush

@section('content')
    <section class="forms">
        <div class="container-fluid">
            <div class="line"></div>



            <!-- Basic Form-->
            <div class="card">

                {!! Form::open(['route' => 'admin.picture.store', 'method' => 'POST', 'files' => true, 'data-parsley-validate'=>'']) !!}



                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Add Picture</h3>
                </div>
                <div class="card-body">



                    <div class="line"></div>
                    <div class="form-group row">


                        {{ Form::label('date', ' Date',['class' => 'col-sm-3 form-control-label']) }}
                        <div class="col-sm-9">
                            {{ Form::date('date', null, array('class' => 'form-control','required'=>'','placeholder'=>'')) }}
                            @if (count($errors) > 0)
                                <span style="color:red ; display: block">
                           {!! $errors->first('date') !!}
                         </span>
                                <br>
                            @endif

                        </div>
                    </div>

                    <div class="line"></div>
                    <div class="form-group row">


                        {{ Form::label('title', ' Person Name',['class' => 'col-sm-3 form-control-label']) }}
                        <div class="col-sm-9">
                            {{ Form::text('title', null, array('class' => 'form-control','required'=>'','placeholder'=>' Person Name')) }}
                            @if (count($errors) > 0)
                                <span style="color:red ; display: block">
                           {!! $errors->first('title') !!}
                         </span>
                                <br>
                            @endif

                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row ">

                        {{ Form::label('image', 'Image',['class' => 'col-sm-3 form-control-label']) }}
                        <div class="col-sm-9">
                            {{ Form::file('image[]',array('multiple'=>'multiple','class' => 'form-control-file'))}}
                            @if (count($errors) > 0)
                                <span style="color:red ; display: block">
                           {!! $errors->first('image.*') !!}
                           {!! $errors->first('image') !!}
                         </span>
                                <br>
                            @endif
                        </div>

                    </div>
                    <div class="form-group">

                        {{ Form::submit('Add Picture', array('class' => 'btn btn-primary')) }}
                    </div>






                </div>






                <!-- Form Elements -->




            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('backend/js/sweetalert2.all.min.js') }}"></script>

    @if(session('successMsg'))
        <script>
            Swal({
                position: 'middle',
                type: 'success',
                title: 'Photo Gallery Successfully Saved',
                showConfirmButton: false,
                timer: 1200

            }).then(function () {
                window.location.reload();
            })
        </script>

    @endif


@endpush
