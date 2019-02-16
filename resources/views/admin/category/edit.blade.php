@extends('layouts.backend.app')


@push('css')



@endpush

@section('content')
    <section class="forms">
        <div class="container-fluid">

            <div class="row">

                <!-- Basic Form-->

                <div class="col-lg-12">
                    {!! Form::model($category,['route' => ['admin.category.update',$category->id], 'method' => 'PUT']) !!}

                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Edit Notice</h3>
                        </div>
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

                                {{ Form::submit('Edit Notice', array('class' => 'btn btn-primary')) }}
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
                title: 'Your work has been Updated',
                showConfirmButton: false,
                timer: 1200

            }).then(function () {
                window.location.reload();
            })
        </script>

    @endif


@endpush
