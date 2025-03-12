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



    @if(count($posts))
    <section class="py-6">
        <div class="container mx-auto">
            <div class="">
                {{-- Hero Post      --}}
                @foreach ($posts->take(1) as $post)
                <div>
                    <x-blog-feature-card :post="$post" />
                </div>
                @endforeach
                {{-- Hero Post      --}}
            </div>
        </div>
    </section>
    <section class="pb-16 pt-16" >
        <div class="container mx-auto " >
            <div class="grid sm:grid-cols-3 gap-x-14 gap-y-14">
                @foreach ($posts->skip(1) as $post)
                <x-blog-card :post="$post" />
                @endforeach
            </div>
            <div class="flex justify-center mt-6">
                <a href="{{ route('filamentblog.post.all') }}" class="flex mx-auto md:gap-x-5 rounded-xl border shadow bg-slate-100 px-16 py-4   text-sm font-semibold  hover:text-red-500 duration-500 ease-in-out hover:bg-slate-200">
                    <span class="block px-6">Show all blogs</span>
                </a>
            </div>
        </div>
    </section>
    @else
    <div class="container  mx-auto">
        <div class="flex justify-center">
            <p class="text-2xl font-semibold text-gray-300">No posts found</p>
        </div>
    </div>
    @endif

  

</x-blog-layout>
