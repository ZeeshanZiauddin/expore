<x-blog-layout>

    
<style>
    .bg-image {
        background-image: url('assets/images/bg/about-bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
<section class="relative table w-full items-center py-36 bg-image bg-top bg-no-repeat bg-cover">
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
            aria-current="page">Blogs</li>
    </ul>
</div>
</section>
    <section class="py-10 container">
        <header class="">
            <h1 class="inherits-color text-balance leading-tighter relative z-10 text-4xl font-bold tracking-tight">
                Latest Blogs
            </h1>
        </header>
    </section>
   
    <section class="relative md:py-16 py-6">
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
            <div class="mt-20">
                {{ $posts->links() }}
            </div>
            <div class="grid md:grid-cols-12 grid-cols-1 mt-6">
                <div class="md:col-span-12 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="inline-flex items-center -space-x-px">
                            <li>
                                <a href="#" class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-s-3xl hover:text-white border border-gray-100 dark:border-gray-800 hover:border-red-500 dark:hover:border-red-500 hover:bg-red-500 dark:hover:bg-red-500">
                                    <i data-feather="chevron-left" class="size-5 rtl:rotate-180 rtl:-mt-1"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="size-[40px] inline-flex justify-center items-center text-slate-200 hover:text-white bg-red-500 border border-red-500">1</a>
                            </li>
                            <li>
                                <a href="#" class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-e-3xl hover:text-white border border-gray-100 dark:border-gray-800 hover:border-red-500 dark:hover:border-red-500 hover:bg-red-500 dark:hover:bg-red-500">
                                    <i data-feather="chevron-right" class="size-5 rtl:rotate-180 rtl:-mt-1"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div><!--end col-->
            </div>

        

        </div>
    </section>
</x-blog-layout>
