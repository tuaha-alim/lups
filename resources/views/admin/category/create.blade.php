@extends('layouts.backend.app')


@push('css')



@endpush

@section('content')
    <section class="forms">
        <div class="container-fluid">

            <div class="row">

                <!-- Basic Form-->

                <div class="col-lg-12">
                    {!! Form::open(['route' => 'admin.category.store', 'method' => 'POST', 'data-parsley-validate'=>'']) !!}

                    <div class="card">

                    
                        <div class="card-body">



                            <div class="form-group">
                                {{ Form::label('name', 'Name') }}
                                {{ Form::text('name', null, array('class' => 'form-control','required'=>'','placeholder'=>'Name')) }}
                                @if (count($errors) > 0)
                                    <span style="color:red">
                           {!! $errors->first('name') !!}
                         </span>
                                @endif


                            </div>


                            <div class="form-group">

                                {{ Form::submit('Add Notice', array('class' => 'btn btn-primary')) }}
                            </div>


                        </div>
                    </div>
                    {!! Form::close() !!}

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
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1200

            }).then(function () {
                window.location.reload();
            })
        </script>

    @endif


@endpush
