<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" author="Nevadia Technology">
    <title>LUPS</title>
    <link rel="stylesheet" href="{{asset('frontend/css/https _cdnjs.cloudflare.com_ajax_libs_OwlCarousel2_2.2.1_assets_owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/https _cdnjs.cloudflare.com_ajax_libs_OwlCarousel2_2.2.1_assets_owl.theme.default.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Supermercado+One" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/lightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/loaders.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">




    @stack('css')
</head>
<body>
@include('layouts.frontend.partial.topbar')

@yield('content')

@include('layouts.frontend.partial.footer')


<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/owlCarousel2_2.2.1_owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/lightbox.min.js')}}"></script>
<script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.lazy.min.js')}}"></script>


<script src="{{asset('frontend/js/custom.js')}}"></script>
<script src="{{asset('frontend/js/sweetalert.js')}}"></script>

@if(Session::has('ttitle'))
    <script>
        swal({
            title: "{{session('ttitle')}}",
            text: "{{session('tmsg')}}",
            icon: "{{session('ticon')}}",
            button: "Ok!",
        });
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
                                    location.reload();
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