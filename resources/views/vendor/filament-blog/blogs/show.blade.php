<x-blog-layout>

    {!! $shareButton?->script_code !!}

      <!-- Start Hero -->
      <section class="relative table w-full items-center py-36 bg-[url('{{$post->featurePhoto}}')] bg-top bg-no-repeat bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center mt-10">
                <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">{{$post->title}}</h3>

                <ul class="list-none mt-6">
                    <li class="inline-block text-white/50 mx-5"> <span class="text-white block">Author :</span> <span class="block">{{$post->user->name()}}</span></li>
                    <li class="inline-block text-white/50 mx-5"> <span class="text-white block">Date :</span> <span class="block">{{$post->formattedPublishedDate()}}</span></li>
                    <li class="inline-block text-white/50 mx-5"> <span class="text-white block">Time :</span> <span class="block">5 Min Read</span></li>
                </ul>
            </div><!--end grid-->
        </div><!--end container-->
        
        <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
            <ul class="tracking-[0.5px] mb-0 inline-block">
                <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="{{ route('home') }}">Home</a></li>
                <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
                                <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="{{ route('filamentblog.post.all') }}">Blogs</a></li>
                <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
                <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">{{$post->title}}</li>
            </ul>
        </div>
    </section><!--end section-->
    <!-- End Hero -->

    <!-- Start -->
    <section class="relative md:py-24 py-16">
        <div class="container">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
                <div class="lg:col-span-8 md:col-span-6">
                    <div class="relative overflow-hidden rounded-md shadow dark:shadow-gray-800">

                        <img src="{{$post->featurePhoto}}" alt="{{$post->photo_alt_text}}" class="rouded-xl w-full">
                        
                        <div class="p-6">
                            <article class="m-auto leading-6">
                                {!! tiptap_converter()->asHTML($post->body, toc: true, maxDepth: 3) !!}
                            </article>
                        </div>
                        @if($post->tags->count())
                        <div class="pt-10 px-2 py-2">
                            <span class="mb-2 block font-semibold ">Tags</span>
                            <div class="py-2 ">
                                @foreach ($post->tags as $tag)
                                <a href="{{ route('filamentblog.tag.post', ['tag' => $tag->slug]) }}" class="rounded-full border border-slate-300 px-3 py-2 me-2 text-sm font-medium font-medium text-black text-slate-600 hover:bg-slate-100">
                                    {{ $tag->name }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

                </div>

                <div class="lg:col-span-4 md:col-span-6">
                    <div class="sticky top-20">
                        <h5 class="text-lg font-medium bg-gray-50 dark:bg-slate-800 shadow dark:shadow-gray-800 rounded-md p-2 text-center">Author</h5>
                        <div class="text-center mt-8">
                            <img src="{{$post->user->avatar}}" class="h-20 w-20 mx-auto rounded-full shadow mb-4" alt="">

                            <a href="" class="text-lg font-medium hover:text-red-500 transition-all duration-500 ease-in-out h5">{{$post->user->name()}}</a>
                            <p class="text-slate-400">Content Writer</p>
                        </div>

                     
                    </div>
                </div>
            </div>
        </div>

        <div class="container lg:mt-24 mt-16">
            <div class="grid grid-cols-1 mb-6 text-center">
                <h3 class="font-semibold text-3xl leading-normal">Related Blogs</h3>
            </div><!--end grid-->

            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-6 pt-6">
                @forelse($post->relatedPosts() as $post)
                <x-blog-card :post="$post" />
                @empty
                <div class="w-full">
                    <p class="text-center text-xl font-semibold text-gray-300">No related posts found.</p>
                </div>
                @endforelse

            </div><!--end grid-->
            <div class="flex justify-center mt-6">
                <a href="{{ route('filamentblog.post.all') }}" class="flex mx-auto md:gap-x-5 rounded-xl border shadow bg-slate-100 px-16 py-4   text-sm font-semibold  hover:text-red-500 duration-500 ease-in-out hover:bg-slate-200">
                    <span class="block px-6">Show all blogs</span>
                </a>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
</x-blog-layout>
