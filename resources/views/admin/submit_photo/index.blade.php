@extends('layouts.backend.app')
@section('title',' Teacher')
@push('css')





@endpush

@section('content')





    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-close">
                            <div class="dropdown">
                                <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a></div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">All Teacher</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($sendPhoto))
                                        @forelse($sendPhoto as $key => $photo)
                                            <tr>
                                                <td>{{$photo->name}}</td>
                                                <td>{{$photo->category->name}}</td>
                                                <td>{{$photo->email}}</td>
                                                <td>{{$photo->message}}</td>

                                                <td>
                                                    <a href="{{route('admin.submit_photo.show',$photo->name)}}" class="btn btn-primary ">
                                                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                    </a>


                                                    <button class="btn btn-danger " type="button"
                                                            onclick="deletephoto({{ $photo->id }}) ">
                                                        <i class="fa fa-remove"></i>

                                                    </button>
                                                    <form id="delete-form-{{ $photo->id }}" method="POST"
                                                          action="{{route('admin.submit_photo.destroy',$photo->id)}}" style="display: none;"

                                                    >
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                </td>
                                            </tr>



                                        @empty
                                            <tr>

                                                <td></td>
                                                <td></td>
                                                <td>Empty</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    @endif

                                    </tbody>
                                </table>
                                {{ $sendPhoto->links() }}
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
        function  deletephoto(id) {
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


    @if(session('deleteMsg'))
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