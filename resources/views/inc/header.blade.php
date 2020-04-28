<header class="navbar navbar-fixed-top bg-system">
    <div class="navbar-logo-wrapper bg-system">
        <a class="navbar-logo-text" href="home">
            <b class="animated fadeIn"> H R M S </b>
        </a>

        <span id="sidebar_left_toggle" class="ad ad-lines"></span>
    </div>
    <ul class="nav navbar-nav navbar-left">
        <li class="hidden-xs">
            <a class="navbar-fullscreen toggle-active" href="#">
                <span class="glyphicon glyphicon-fullscreen"></span>
            </a>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown dropdown-fuse">
            <div class="navbar-btn btn-group">
        <li class="dropdown dropdown-fuse">
            {{--            <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">--}}
            {{--                <span class="hidden-xs"><name></name> </span>
                            <span class="fa fa-caret-down hidden-xs mr15"></span>
            --}}{{--                @if(isset())--}}{{--
                                <img src="" width="50px" height="50px" alt="avatar" class="mw55">
            --}}{{--                @else--}}{{--
                                <img src="/assets/img/avatars/profile_pic.png" alt="avatar" class="mw55">
            --}}{{--                @endif--}}{{--
                        </a>
                        <li class="dropdown-menu list-group keep-dropdown w250" role="menu">
            --}}{{--                @if()--}}{{--
                                <li class="dropdown-footer text-center">
                                    <a href="/change-password" class="btn btn-primary btn-sm btn-bordered">
                                        <span class="fa fa-lock pr5"></span> Change Password </a>
                                </li>
            --}}{{--                @endif--}}{{--
                            <li class="dropdown-footer text-center">
                                <a href="/logout" class="btn btn-primary btn-sm btn-bordered">
                                    <span class="fa fa-power-off pr5"></span> Logout </a>
                            </li>--}}

            <a id="navbarDropdown" class="nav-link dropdown-toggle offset-2 animated fadeIn" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div style="text-align: center" class="dropdown-menu dropdown-menu-right animated fadeIn"
                 aria-labelledby="navbarDropdown">
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

