<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
<nav class="site-nav mt-3">
    <div class="container">

        <div class="site-navigation">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <a href="{{route('home.view')}}" class="logo m-0 float-start">Sterial</a>
                </div>
                <div class="col-lg-6 d-none d-lg-inline-block text-center nav-center-wrap">
                    <ul class="js-clone-nav  text-center site-menu p-0 m-0">
                        <li class="active"><a href="{{route('home.view')}}">Home</a></li>
                        <li><a href="{{route('home.about.view')}}">About us</a></li>

                        <li><a href="{{route('home.services.view')}}">Services</a></li>
                        <li><a href="{{route('home.blog.view')}}">Blog</a></li>

                    </ul>
                </div>
                <div class="col-6 col-lg-3 text-lg-end">
                    <ul class="js-clone-nav d-none d-lg-inline-block text-end site-menu ">
                        <li class="cta-button"><a href="{{route('home.contact.view')}}">Contact Us</a></li>
                    </ul>

                    <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</nav>
