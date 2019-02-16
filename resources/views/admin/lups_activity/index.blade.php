@extends('layouts.backend.app')

@push('css')





@endpush

@section('content')



    <br>
    <br>
    <br>
    <a href="{{route('admin.lupsActivity.create')}}" class="btn btn-sm btn-primary" style="margin-left: 10px">Add LUPS Activity</a>

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
                            <h3 class="h4">All Slider</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>

                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>

                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($lups_activitries))
                                        @forelse($lups_activitries as $key => $lups_activity)
                                            <tr>

                                                <td><img src="{{ url('storage/lups_activitries/'.$lups_activity->image) }}" height="50" width="50"></td>
                                                <td>{{$lups_activity->name}}</td>
                                                <td>{{$lups_activity->description}}</td>


                                                <td>




                                                    <button data-id="{{$lups_activity->id}}" data-name="{{$lups_activity->name}}" data-pic="{{$lups_activity->image}}"data-url="/admin/deleteactivity"
                                                            type="button" class="btn btn-danger  DeleteContent" > <i class="fa fa-remove"></i></button>

                                                </td>
                                            </tr>



                                        @empty
                                            <tr>


                                                <td></td>
                                                <td></td>
                                                <td>Empty</td>
                                                <td></td>

                                            </tr>
                                        @endforelse
                                    @endif

                                    </tbody>
                                </table>
                                {{ $lups_activitries->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@push('js')


@endpush