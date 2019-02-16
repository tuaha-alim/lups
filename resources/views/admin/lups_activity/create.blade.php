@extends('layouts.backend.app')


@push('css')



@endpush

@section('content')


    <section class="forms">
        <div class="container-fluid">
            <div class="line"></div>



            <!-- Basic Form-->
            <div class="card">

                {!! Form::open(['route' => 'admin.lupsActivity.store', 'method' => 'POST', 'files' => true ,'data-parsley-validate'=>'']) !!}



                <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Add LUPS Activity</h3>
                </div>
                <div class="card-body">

                                     <div class="line"></div>
                    <div class="form-group row ">

                        {{ Form::label('image', 'Image (PNG)',['class' => 'col-sm-3 form-control-label']) }}
                        <div class="col-sm-9">
                            {{ Form::file('image',array('class' => 'form-control-file','required'=>'')) }}

                            @if (count($errors) > 0)
                                <span style="color:red">
                           {!! $errors->first('image') !!}
                         </span>
                            @endif
                        </div>

                    </div>

                    <div class="line"></div>
                    <div class="form-group row ">

                        {{ Form::label('Name', 'Activity Name',['class' => 'col-sm-3 form-control-label']) }}
                        <div class="col-sm-9">


                            {{ Form::text('name', null, array('class' => 'form-control','required'=>'','placeholder'=>'Activity Name')) }}
                            @if (count($errors) > 0)
                                <span style="color:red">
                           {!! $errors->first('name') !!}
                         </span>
                            @endif


                        </div>

                    </div>



                    <div class="line"></div>
                    <div class="form-group row ">

                        {{ Form::label('Description', 'Description',['class' => 'col-sm-3 form-control-label']) }}
                        <div class="col-sm-9">


                            {{Form::textarea('description', null, ['class'=>'form-control','required'=>'','placeholder'=>'Description'])}}
                            @if (count($errors) > 0)
                                <span style="color:red">
                           {!! $errors->first('description') !!}
                         </span>
                            @endif

                        </div>

                    </div>


                    <div class="form-group">

                        {{ Form::submit('Add Activity', array('class' => 'btn btn-primary')) }}
                    </div>


                </div>

            </div>
        </div>
    </section>

@endsection

@push('js')



@endpush