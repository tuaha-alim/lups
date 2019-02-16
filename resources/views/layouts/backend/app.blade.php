<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Photo Graphic Society</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('backend/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{asset('backend/css/fontastic.css')}}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('backend/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('backend/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('backend/img/favicon.ico')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    @stack('css')
</head>
<body>
<div class="page">

    @include('layouts.backend.partial.topbar')



    <div class="page-content d-flex align-items-stretch">



        @include('layouts.backend.partial.sidebar')

        <div class="content-inner">

          @yield('content')


        @include('layouts.backend.partial.footer')


    </div>
    </div>
</div>
<!-- JavaScript files-->
<script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/vendor/popper.js/umd/popper.min.js')}}"> </script>
<script src="{{asset('backend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
<script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('backend/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('backend/js/charts-home.js')}}"></script>
<!-- Main File-->
<script src="{{asset('backend/js/front.js')}}"></script>


<script src="{{asset('backend/js/sweetalert.js')}}"></script>

@if(Session::has('ttitle'))
    <script>
        swal({
            title: "{{session('ttitle')}}",
            text: "{{session('tmsg')}}",
            icon: "{{session('ticon')}}",
            button: "Ok!",
        }).then((value) => {
            window.location.reload();
        })
    </script>
@endif


<script>
    $(document).on('click', '.DeleteContent', function() {
        var sname=$(this).data('name');
        var urlEx=$(this).data('url');
        swal({
            title: "Delete "+sname+"?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "error",
            buttons: true,
            dangerMode: true,
        })

            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'post',
                        url: urlEx,
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'id': $(this).data('id'),
                            'picture': $(this).data('pic'),
                        },
                        
                        success: function(data) {
                            swal("Poof! This data has been deleted!")
                                .then((value) => {
                                    window.location.reload();
                                });

                        }
                    });


                } else {
                    swal("This data is safe!");
                }
            });
    });
</script>


<script>


    $(document).on('click', '.showDescription', function() {
        var desc=$(this).data('description');
        swal({
            title: "Description",
            text: desc,
            icon: "warning",
        })

    });

</script>






<script>
    $('#ButtonRefresh').click(function(){
        location.reload();

    });
</script>





@stack('js')
</body>
</html>