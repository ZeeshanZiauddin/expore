@extends('layouts.app')

@section('content')

<style>
    .bg-image {
        background-image: url('assets/images/bg/about-bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
<!-- Start Hero -->
<section
    class="relative table w-full items-center py-36 bg-image bg-top bg-no-repeat bg-cover">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">Explore Flights</h3>
        </div>
        <!--end grid-->
    </div>
    <!--end container-->

    <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
        <ul class="tracking-[0.5px] mb-0 inline-block">
            <li
                class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                <a href="/">Explore Flights</a>
            </li>
            <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i
                    class="mdi mdi-chevron-right"></i></li>
            <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white"
                aria-current="page">About Us</li>
        </ul>
    </div>
</section>
<!--end section-->
<!-- End Hero -->

<!-- Start -->
<section class="relative md:py-24 py-16">
    <div class="container relative">
        <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
            <div class="md:col-span-5">
                <div class="relative">
                    <img src="{{asset('assets/images/brand-600x750.jpg')}}" class="mx-auto rounded-3xl shadow dark:shadow-gray-700 w-[90%]"
                        alt=""> 


                    <div
                        class="absolute flex items-center bottom-16 md:-start-10 -start-5 p-4 rounded-lg shadow-md dark:shadow-gray-800 bg-white dark:bg-slate-900 w-56 m-3">
                        <div
                            class="flex items-center justify-center h-[65px] min-w-[65px] bg-red-500/5 text-red-500 text-center rounded-xl me-3">
                            <i data-feather="users" class="size-6"></i>
                        </div>
                        <div class="flex-1">
                            <span class="text-slate-400">Visitor</span>
                            <p class="text-xl font-bold"><span class="counter-value" data-target="4589">2100</span></p>
                        </div>
                    </div>

                    <div
                        class="absolute flex items-center top-16 md:-end-10 -end-5 p-4 rounded-lg shadow-md dark:shadow-gray-800 bg-white dark:bg-slate-900 w-60 m-3">
                        <div
                            class="flex items-center justify-center h-[65px] min-w-[65px] bg-red-500/5 text-red-500 text-center rounded-xl me-3">
                            <i data-feather="globe" class="size-6"></i>
                        </div>
                        <div class="flex-1">
                            <span class="text-slate-400">Travel Packages</span>
                            <p class="text-xl font-bold"><span class="counter-value" data-target="140">1</span>+</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:col-span-7">
                <div class="lg:ms-8">
                    <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">World Best
                        Travel <br> Agency: Travosy</h3>

                    <p class="text-slate-400 max-w-xl mb-6">Get instant helpful resources about anything on the go,
                        easily implement secure money transfer solutions, boost your daily efficiency, connect to other
                        app users and create your own Travosy network, and much more with just a few taps. commodo
                        consequat. Duis aute irure.</p>

                    <a href=""
                        class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Read
                        More <i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
                </div>
            </div>

            <div class="absolute bottom-0 start-1/3 -z-1">
                <img src="assets/images/map-plane-big.png" class="lg:w-[600px] w-96" alt="">
            </div>
        </div>
    </div>
    <!--end container-->

    <div class="container relative md:mt-24 mt-16">
        <div class="grid grid-cols-1 pb-6 text-center">
            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Our Team</h3>

            <p class="text-slate-400 max-w-xl mx-auto">This is just a simple text made for this unique and awesome
                template, you can replace it with any text.</p>
        </div>
        <!--end grid-->

        <div class="grid md:grid-cols-12 grid-cols-1 mt-8 gap-[30px]">
            <div class="lg:col-span-3 md:col-span-6">
                <div class="group text-center">
                    <div class="relative inline-block mx-auto h-52 w-52 rounded-full overflow-hidden">
                        <img src="assets/images/client/4.png" class="" alt="">
                        <div
                            class="absolute inset-0 bg-gradient-to-b from-transparent to-black h-52 w-52 rounded-full opacity-0 group-hover:opacity-100 duration-500">
                        </div>

                        <ul class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 duration-500">
                            <li class="inline"><a href=""
                                    class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><i
                                        data-feather="facebook" class="size-4"></i></a></li>
                            <li class="inline"><a href=""
                                    class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><i
                                        data-feather="instagram" class="size-4"></i></a></li>
                            <li class="inline"><a href=""
                                    class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><i
                                        data-feather="linkedin" class="size-4"></i></a></li>
                        </ul>
                        <!--end icon-->
                    </div>

                    <div class="content mt-3">
                        <a href="" class="text-lg font-semibold hover:text-red-500 duration-500">Peter Elvis</a>
                        <p class="text-slate-400">Agent</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3 md:col-span-6">
                <div class="group text-center">
                    <div class="relative inline-block mx-auto h-52 w-52 rounded-full overflow-hidden">
                        <img src="assets/images/client/5.png" class="" alt="">
                        <div
                            class="absolute inset-0 bg-gradient-to-b from-transparent to-black h-52 w-52 rounded-full opacity-0 group-hover:opacity-100 duration-500">
                        </div>

                        <ul class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 duration-500">
                            <li class="inline"><a href=""
                                    class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><i
                                        data-feather="facebook" class="size-4"></i></a></li>
                            <li class="inline"><a href=""
                                    class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><i
                                        data-feather="instagram" class="size-4"></i></a></li>
                            <li class="inline"><a href=""
                                    class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><i
                                        data-feather="linkedin" class="size-4"></i></a></li>
                        </ul>
                        <!--end icon-->
                    </div>

                    <div class="content mt-3">
                        <a href="" class="text-lg font-semibold hover:text-red-500 duration-500">Krista John</a>
                        <p class="text-slate-400">Agent</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3 md:col-span-6">
                <div class="group text-center">
                    <div class="relative inline-block mx-auto h-52 w-52 rounded-full overflow-hidden">
                        <img src="assets/images/client/1.jpg" class="" alt="">
                        <div
                            class="absolute inset-0 bg-gradient-to-b from-transparent to-black h-52 w-52 rounded-full opacity-0 group-hover:opacity-100 duration-500">
                        </div>

                        <ul class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 duration-500">
                            <li class="inline"><a href=""
                                    class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><i
                                        data-feather="facebook" class="size-4"></i></a></li>
                            <li class="inline"><a href=""
                                    class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><i
                                        data-feather="instagram" class="size-4"></i></a></li>
                            <li class="inline"><a href=""
                                    class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><i
                                        data-feather="linkedin" class="size-4"></i></a></li>
                        </ul>
                        <!--end icon-->
                    </div>

                    <div class="content mt-3">
                        <a href="" class="text-lg font-semibold hover:text-red-500 duration-500">Mark Jackson</a>
                        <p class="text-slate-400">Agent</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3 md:col-span-6">
                <div class="group text-center">
                    <div class="relative inline-block mx-auto h-52 w-52 rounded-full overflow-hidden">
                        <img src="assets/images/client/2.png" class="" alt="">
                        <div
                            class="absolute inset-0 bg-gradient-to-b from-transparent to-black h-52 w-52 rounded-full opacity-0 group-hover:opacity-100 duration-500">
                        </div>

                        <ul class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 duration-500">
                            <li class="inline"><a href=""
                                    class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><i
                                        data-feather="facebook" class="size-4"></i></a></li>
                            <li class="inline"><a href=""
                                    class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><i
                                        data-feather="instagram" class="size-4"></i></a></li>
                            <li class="inline"><a href=""
                                    class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><i
                                        data-feather="linkedin" class="size-4"></i></a></li>
                        </ul>
                        <!--end icon-->
                    </div>

                    <div class="content mt-3">
                        <a href="" class="text-lg font-semibold hover:text-red-500 duration-500">Maria Johanson</a>
                        <p class="text-slate-400">Agent</p>
                    </div>
                </div>
            </div>
        </div>
        <!--end grid-->
    </div>
    <!--end container-->

    <!--end container-->


    
    <section class="relative md:py-16 py-6">
        <div class="grid grid-cols-1 pb-6 text-center">
            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Travel Blogs</h3>

            <p class="text-slate-400 max-w-xl mx-auto">This is just a simple text made for this unique and awesome
                template, you can replace it with any text.</p>
        </div>
        <div class="container relative">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
                @forelse ($posts as $post)
                     <x-blog-card :post="$post"/>
                @empty
                    <div class="mx-auto col-span-3">
                        <div class="flex items-center justify-center">
                            <p class="text-2xl font-semibold text-gray-300">No posts found</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="flex justify-center mt-6">
                <a href="{{ route('filamentblog.post.all') }}" class="flex mx-auto md:gap-x-5 rounded-xl border shadow bg-slate-100 px-16 py-4   text-sm font-semibold  hover:text-red-500 duration-500 ease-in-out hover:bg-slate-200">
                    <span class="block px-6">Show all blogs</span>
                </a>
            </div>
          
        </div>
    </section>
    <!--end container-->
</section>
<!--end section-->
<!-- End -->

<!-- Insta Post Start -->
<div class="container-fluid relative">
    <div class="grid grid-cols-1 relative">
        <div class="tiny-twelve-item">
            <div class="tiny-slide">
                <a href="assets/images/listing/1.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/1.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>

            <div class="tiny-slide">
                <a href="assets/images/listing/2.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/2.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>

            <div class="tiny-slide">
                <a href="assets/images/listing/3.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/3.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>

            <div class="tiny-slide">
                <a href="assets/images/listing/4.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/4.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>

            <div class="tiny-slide">
                <a href="assets/images/listing/5.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/5.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>

            <div class="tiny-slide">
                <a href="assets/images/listing/6.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/6.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>

            <div class="tiny-slide">
                <a href="assets/images/listing/7.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/7.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>

            <div class="tiny-slide">
                <a href="assets/images/listing/8.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/8.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>

            <div class="tiny-slide">
                <a href="assets/images/listing/9.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/9.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>

            <div class="tiny-slide">
                <a href="assets/images/listing/10.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/10.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>

            <div class="tiny-slide">
                <a href="assets/images/listing/11.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/11.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>

            <div class="tiny-slide">
                <a href="assets/images/listing/12.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/12.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>

            <div class="tiny-slide">
                <a href="assets/images/listing/5.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/5.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>

            <div class="tiny-slide">
                <a href="assets/images/listing/8.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/8.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>

            <div class="tiny-slide">
                <a href="assets/images/listing/4.jpg" class="lightbox d-inline-block" title="">
                    <img src="assets/images/listing/4.jpg" class="sm:size-40 object-cover" alt="">
                </a>
            </div>
        </div>

        <div class="absolute top-2/4 -translate-y-2/4 start-2/4 ltr:-translate-x-2/4 rtl:translate-x-2/4 text-center">
            <a href="https://www.instagram.com/shreethemes/" target="_blank"
                class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border border-red-500 bg-red-500 text-white"><i
                    data-feather="instagram" class="size-4"></i></a>
        </div>
    </div>
    <!--end grid-->
</div>
<!--end container-->
<!-- Insta Post End -->
@endsection