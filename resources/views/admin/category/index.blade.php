@extends('layouts.backend.app')
@section('title',' Notice')
@push('css')





@endpush

@section('content')

    <br>
    <br>
    <br>
    <a href="{{route('admin.category.create')}}" class="btn btn-sm btn-primary" style="margin-left: 10px">Add Category</a>
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
                            <h3 class="h4">All Category</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($categories))
                                        @forelse($categories as $key => $category)
                                            <tr class=>
                                                <td>{{$key+1}}</td>
                                                <td>{{$category->name}}</td>



                                                <td>
                                                    <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-primary ">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <button class="btn btn-danger " type="button"
                                                            onclick="deletecategory({{ $category->id }}) ">
                                                        <i class="fa fa-remove"></i>

                                                    </button>
                                                    <form id="delete-form-{{ $category->id }}" method="POST"
                                                          action="{{route('admin.category.destroy',$category->id)}}" style="display: none;"

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
                                                <td>No category</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforelse
                                    @endif

                                    </tbody>
                                </table>
                                {{ $categories->links() }}

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
        function  deletecategory(id) {
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
                title:'Notice Successfully deleted',
                timer: 1200

            }).then(function () {
                window.location.reload();
            })
        </script>

    @endif

@endpush