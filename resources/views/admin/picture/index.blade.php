@extends('layouts.backend.app')

@push('css')





@endpush

@section('content')



    <br>
    <br>
    <br>
    <a href="{{route('admin.picture.create')}}" class="btn btn-sm btn-primary" style="margin-left: 10px">Add Picture</a>

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
                            <h3 class="h4">All picture</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>

                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($pictures))
                                        @forelse($pictures as $key =>$picture)
                                            <tr>
                                                <td>{{$picture->title}}</td>
                                                <td><img src="{{ url('storage/picture/'.$picture->image) }}" height="50" width="50"></td>


                                                <td>

                                                    <button class="btn btn-danger " type="button"
                                                            onclick="deletephoto({{ $picture->id }}) ">
                                                        <i class="fa fa-remove"></i>

                                                    </button>
                                                    <form id="delete-form-{{ $picture->id }}" method="POST"
                                                          action="{{route('admin.picture.destroy',$picture->id)}}" style="display: none;"

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
                                {{ $pictures->links() }}
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