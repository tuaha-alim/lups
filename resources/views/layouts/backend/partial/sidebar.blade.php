 <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="{{url('backend/img/avatar-1.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">{{Auth::user()->name}}</h1>

            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
                    <li class="{{Request::is('admin/dashboard') ? 'active' : ''}}"><a href="{{route('admin.dashboard')}}"> <i class="icon-home"></i>Home </a></li>
                    <li class="{{Request::is('admin/category*') ? 'active' : ''}}"><a href="{{route('admin.category.index')}}"> <i class="icon-padnote"></i>Category </a></li>
                    <li class="{{Request::is('admin/submit_photo*') ? 'active' : ''}}"><a href="{{route('admin.submit_photo.index')}}"> <i class="fa fa-info-circle" aria-hidden="true"></i>Submitted Details </a></li>
                    <li class="{{Request::is('admin/picture*') ? 'active' : ''}}"><a href="{{route('admin.picture.index')}}"><i class="fa fa-picture-o" aria-hidden="true"></i>Picture </a></li>
                    <li class="{{Request::is('admin/slider*') ? 'active' : ''}}"><a href="{{route('admin.slider.index')}}"><i class="fa fa-slideshare" aria-hidden="true"></i>Slider </a></li>
                    <li class="{{Request::is('admin/lupsActivity*') ? 'active' : ''}}"><a href="{{route('admin.lupsActivity.index')}}"><i class="fa fa-info-circle" aria-hidden="true"></i>LUPS Activity </a></li>
                    <li class="{{Request::is('admin/photo_gallery*') ? 'active' : ''}}"><a href="{{route('admin.photo_gallery.index')}}"><i class="fa fa-floppy-o" aria-hidden="true"></i>LUPS Photo Gallery </a></li>
          </ul>

        </nav>