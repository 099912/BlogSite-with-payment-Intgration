<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{route('admin.view')}}">
            <img src="{{asset('vendors/images/deskapp-logo.svgc')}}" alt="" class="dark-logo">
            <img src="{{asset('vendors/images/deskapp-logo-white.svg')}}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{route('chat.view')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-chat3"></span><span class="mtext">Chat</span>
                    </a>
                </li>
@if(auth()->user()->status == 'admin')
                    <li>
                        <a href="{{route('admin.view')}}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-edit2"></span><span class="mtext">User</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('product.view')}}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-edit2"></span><span class="mtext">Product</span>
                        </a>
                    </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home </span>
                    </a>

                    <ul class="submenu">
                        <li><a href="{{route('home.head.show')}} ">Header</a></li>
                        <li><a href="{{route('home.explore.show')}} ">Explore</a></li>
                        <li><a href="{{route('home.travel.show')}}">Travel</a></li>
                        <li><a href="{{route('home.memories.show')}}">Memories</a></li>
                        {{-- <li><a href="{{route('home.faq.show')}}">FAQ</a></li> --}}
                        <li><a href="{{route('home.testimonial.show')}}">Testimonial</a></li>


                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-library"></span><span class="mtext">About</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('about.header.show')}}">Header</a></li>
                        <li><a href="{{route('about.team.show')}}">Team</a></li>
                        <li><a href="{{route('about.position.show')}}">Position</a></li>

                    </ul>

                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-book2"></span><span class="mtext">Service</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('service.header.show')}}">Header</a></li>
                          <li><a href="{{route('service.feature.show')}}">Feature Services</a></li>
                       <li><a href="{{route('service.blog.show')}}">Services Blog</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-sheet"></span><span class="mtext">Blog</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('blog.header.show')}}">Header</a></li>
                          <li><a href="{{route('blog.detail.show')}}">Blog Details</a></li>
                       {{-- <li><a href="{{route('service.blog.show')}}">Services Blog</a></li> --}}

                    </ul>
                  </li>
@endif
@if(auth()->user()->status == 'user')
<ul id="accordion-menu">
    <li>
        <a href="{{route('admin.view')}}" class="dropdown-toggle no-arrow">
            <span class="micon dw dw-edit2"></span><span class="mtext">User</span>
        </a>
    </li>

<li class="dropdown">
  <a href="javascript:;" class="dropdown-toggle">
      <span class="micon dw dw-sheet"></span><span class="mtext">Blog</span>
  </a>
  <ul class="submenu">
      <li><a href="{{route('blog.detail.show')}}">Blog Details</a></li>
     {{-- <li><a href="{{route('service.blog.show')}}">Services Blog</a></li> --}}

  </ul>
</li>
</ul>
@endif
            </ul>
        </div>
    </div>
</div>
