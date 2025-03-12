
<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll is-sticky tagline-height">
    <div class="container relative flex">
        <!-- Logo container-->
        <a class="logo" href="{{route('home')}}">
            <span class="inline-block dark:hidden">
                <img src="{{asset('assets/images/logo-dark.png')}}" class="h-16 l-dark" alt="">
                <img src="{{asset('assets/images/logo-light.png')}}" class="h-16 l-light" alt="">
            </span>
            <img src="{{asset('assets/images/logo-white.png')}}" class="hidden dark:inline-block" alt="">
        </a>
        <!-- End Logo container-->

        <!-- Start Mobile Toggle -->
        <div class="menu-extras ms-auto">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>
        <!-- End Mobile Toggle -->

        {{-- Navigation Starts --}}
        <div id="navigation" class="w-full">
            <!-- Navigation Menu-->
            <ul class="navigation-menu justify-end nav-light">
                <li><a href="{{route('home')}}" class="sub-menu-item">Home</a></li>
                <li><a href="{{route('about')}}" class="sub-menu-item">About Us</a></li>
                <li><a href="{{route('contact')}}" class="sub-menu-item">Contact Us</a></li>                
                <li><a href="{{route('filamentblog.post.all')}}" class="sub-menu-item">Blogs</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</nav><!--end header-->
<!-- End Navbar -->