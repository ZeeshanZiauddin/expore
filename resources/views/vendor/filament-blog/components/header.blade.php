@props(['title' =>'Firefly Blog', 'logo' => null] )

   <!-- TAGLINE START-->
   <div class="tagline bg-slate-900">
    <div class="container relative">                
        <div class="grid grid-cols-1">
            <div class="flex items-center justify-between">
                <ul class="list-none">
                    <li class="inline-flex items-center">
                        <x-heroicon-o-clock class="text-red-500 size-4" />
                        <span class="ms-2 text-slate-300">Mon-Sat: 9am to 6pm</span>
                    </li>
                    <li class="inline-flex items-center ms-2">
                        <x-heroicon-o-map-pin class="text-red-500 size-4" />
                        <span class="ms-2 text-slate-300">102 Piggott street Famworth, Bolton, Bl4 9NS, United Kingdom</span>
                    </li>
                </ul>

                <ul class="list-none">
                    <li class="inline-flex items-center">
                        <x-heroicon-o-envelope class="text-red-500 size-4"  />
                        <a href="mailto:info@exploreflights.co.uk" class="ms-2 text-slate-300 hover:text-slate-200">info@exploreflights.co.uk
                        </a>
                    </li>
                    <li class="inline-flex items-center ms-2">
                        <ul class="list-none">
                            <li class="inline-flex mb-0"><a href="#!" class="text-slate-300 hover:text-red-500"><x-feathericon-facebook class="size-4 align-middle" title="Facebook" /></a></li>
                            <li class="inline-flex ms-2 mb-0"><a href="#!" class="text-slate-300 hover:text-red-500"><x-feathericon-instagram class="size-4 align-middle" title="instagram" /></a></li>
                            <li class="inline-flex ms-2 mb-0"><a href="#!" class="text-slate-300 hover:text-red-500"><x-feathericon-twitter class="size-4 align-middle" title="twitter" /></a></li>
                            <li class="inline-flex ms-2 mb-0"><a href="tel:+442039300075" class="text-slate-300 hover:text-red-500"><x-heroicon-o-phone-arrow-up-right class="size-4 align-middle" title="+442039300075"  /></a></li>
                        </ul><!--end icon-->
                    </li>
                </ul>
            </div>
        </div>
    </div><!--end container-->
    </div><!--end tagline-->
    <!-- TAGLINE END-->
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
                <li><a href="/" class="sub-menu-item">Home</a></li>
                <li><a href="{{route('about')}}" class="sub-menu-item">About Us</a></li>
                <li><a href="{{route('contact')}}" class="sub-menu-item">Contact Us</a></li>
                <li><a href="{{route('filamentblog.post.all')}}" class="sub-menu-item">Blogs</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</nav><!--end header-->
<!-- End Navbar -->


  
