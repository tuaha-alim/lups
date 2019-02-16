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
                                    @foreach($photos->photos as $pic)

                                        <div class="col-lg-3 col-sm-6 col-md-4">
                                            <br>
                                            <div class="hover_box">
                                                <img style="border: 2px solid #796aee73;border-radius: 5px;" class="img-thumbnail" src="{{ url('storage/photoGallery/'.$pic->image) }} ">

                                                <button class="del_btn" type="button"
                                                        onclick="deletephotoAlbumn({{ $pic->id }}) ">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>

                                                </button>
                                                <form id="delete-form-{{ $pic->id }}" method="POST"
                                                      action="{{route('admin.submit_photo.delete',$pic->id)}}" style="display: none;"

                                                >
                                                    @csrf
                                                    @method('DELETE')
                                                </form>


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


    <script src="{{ asset('backend/js/sweetalert2.all.min.js') }}"></script>




    <script type="text/javascript">
        function  deletephotoAlbumn(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })



        }


    </script>


    @if(session('deleteMsg_album'))
        <script>
            Swal({
                position: 'middle',
                type: 'success',
                title: 'Your work has been deleted',
                showConfirmButton: false,
                timer: 1200

            }).then(function () {
                window.location.reload();
            })
        </script>

    @endif

@endpush