@props(['post'])


<div class="group relative overflow-hidden">
    <div class="relative overflow-hidden rounded-md shadow dark:shadow-gray-800">
        <img src="{{ asset($post->featurePhoto) }}" alt="{{ $post->photo_alt_text }}" class="group-hover:scale-110 group-hover:rotate-3 duration-500" >
        <div class="absolute top-0 start-0 p-4 opacity-0 group-hover:opacity-100 duration-500">
            <span class="bg-red-500 text-white text-[12px] px-2.5 py-1 font-medium rounded-md h-5">Travel</span>
        </div>
    </div>

    <div class="mt-6">
        <div class="flex mb-4">
            <span class="flex items-center text-slate-400 text-sm"><i data-feather="clock" class="size-4 text-slate-900 dark:text-white me-1.5"></i>{{$post->formattedPublishedDate()}}</span>
            <span class="text-slate-400 text-sm ms-3">by <a href="{{ route('filamentblog.post.show', ['post' => $post->slug]) }}" class="text-slate-900 dark:text-white hover:text-red-500 dark:hover:text-red-500 font-medium">{{ $post->user->name() }}</a></span>
        </div>

        <a href="{{ route('filamentblog.post.show', ['post' => $post->slug]) }}" class="text-lg font-medium hover:text-red-500 duration-500 ease-in-out" title="{{ $post->title }}">{{ $post->title }}</a>
        <p class="text-slate-400 mt-2">{{ Str::limit($post->sub_title, 100) }}</p>

        <div class="mt-3">
            <a href="{{ route('filamentblog.post.show', ['post' => $post->slug]) }}" class="hover:text-red-500 inline-flex items-center">Read More <i data-feather="chevron-right" class="size-4 ms-1"></i></a>
        </div>
    </div>
</div>
