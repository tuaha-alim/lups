@extends('layouts.backend.app')


@push('css')



@endpush

@section('content')

    <section class="forms">
        <div class="container-fluid">
            <div class="line"></div>



            <!-- Basic Form-->
            <div class="card">

                {!! Form::open(['route' => 'admin.slider.store', 'method' => 'POST', 'files' => true, 'data-parsley-validate'=>'']) !!}



                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Add Slider</h3>
                </div>
                <div class="card-body">

                    <div class="line"></div>
                    <div class="form-group row ">

                        {{ Form::label('image', 'Slider Image',['class' => 'col-sm-3 form-control-label']) }}
                        <div class="col-sm-9">
                            {{ Form::file('image',array('class' => 'form-control-file','required'=>''))}}
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

                        {{ Form::submit('Add Slider', array('class' => 'btn btn-primary')) }}
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')



@endpush