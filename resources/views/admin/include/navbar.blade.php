
<div class="header">
    <div class="header-left">

    </div>
    <div class="header-right">
        <div class="dashboard-setting user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                    <i class="dw dw-settings2"></i>
                </a>
            </div>
        </div>
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-count">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul id="notification-list">
                            <li>

                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{asset('vendors/images/photo1.jpg')}}" alt="">
                    </span>

                    <span class="user-name">{{ auth()->user()->name ?? '' }}</span>

                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
                    <a class="dropdown-item" href="{{route('user.logout')}}"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
        {{-- <div class="github-link">
            <a href="https://github.com/dropways/deskapp" target="_blank"><img src="{{asset('vendors/images/github.svg')}}" alt=""></a>
        </div> --}}
    </div>
</div>