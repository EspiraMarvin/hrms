<header class="navbar navbar-fixed-top bg-system">
    <div class="navbar-logo-wrapper bg-system">
        <span id="sidebar_left_toggle" class="ad ad-lines"></span>
    </div>
    <ul class="nav navbar-nav navbar-left">
        <li class="hidden-xs">
            <a class="navbar-fullscreen toggle-active" href="#">
                <span class="glyphicon glyphicon-fullscreen"></span>
            </a>
        </li>
    </ul>
  {{--  <div class="mt30">
        <i style="font-size: 28px" class="fa fa-bell" aria-hidden="true"></i>
        Messages
        <i style="font-size: 28px" class="fa fa-bell" aria-hidden="true"></i>
        Messages
    </div>--}}


    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown dropdown-fuse">
            <div class="navbar-btn btn-group">
        <li class="dropdown dropdown-fuse">

            <a id="navbarDropdown" class="nav-link dropdown-toggle offset-2 animated fadeIn" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div style="text-align: center;margin-top: -18px" class="dropdown-menu dropdown-menu-right animated fadeIn col-md-12"
                 aria-labelledby="navbarDropdown">
                <a class="dropdown-item btn badge-dark"
                   href="/change-password"> Change Password
                </a>
                <a class="dropdown-item btn badge-dark"
                   href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</header>

