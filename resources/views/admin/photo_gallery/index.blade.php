@extends('layouts.backend.app')
@section('title',' Photo Gallery')
@push('css')





@endpush

@section('content')

    <br>
    <br>
    <br>
    <a href="{{route('admin.photo_gallery.create')}}" class="btn btn-sm btn-primary" style="margin-left: 10px">Add Photo Gallery</a>


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
                            <h3 class="h4">All Photo Gallery</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Activity Name</th>

                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($photo_Galleries))
                                        @forelse($photo_Galleries as $key => $photo_Gallery)
                                            <tr>
                                                <td>{{$photo_Gallery->name}}</td>
                                                <td><img src="{{ url('storage/photo_gallery/'.$photo_Gallery->image) }}" height="50" width="50"></td>
                                                 <td>{{$photo_Gallery->activity->name}}</td>
                                                <td>
                                                    <a href="{{route('admin.photo_gallery.show',$photo_Gallery->id)}}" class="btn btn-primary ">
                                                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                    </a>

                                                  <button class="btn btn-danger " type="button"
                                                            onclick="deletephotoGallery({{ $photo_Gallery->id }}) ">
                                                        <i class="fa fa-remove"></i>

                                                    </button>
                                                    <form id="delete-form-{{ $photo_Gallery->id }}" method="POST"
                                                          action="{{route('admin.photo_gallery.destroy',$photo_Gallery->id)}}" style="display: none;"

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

                                                <td >No Photo Gallery And Photo Album</td>

                                                <td></td>

                                            </tr>
                                        @endforelse
                                    @endif

                                    </tbody>
                                </table>
                                {{ $photo_Galleries->links() }}
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
        function  deletephotoGallery(id) {
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