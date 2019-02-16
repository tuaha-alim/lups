<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="{{url('frontend/img/logolups.png')}}"></a>
    <!-- <a class="navbar-brand" href="#"><img src="img/logo.png"></a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Activitis
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="#">Advisor's Corner</a>
                    <a href="#">Executive Committee</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">member</a>
            </li>
        </ul>
    </div>
</nav>
