@aware(['page'])

@props([
    'title',
    'description',
    'block',
    'buttons',
    'backgrounds',
])


@php
    $totalImages = count($backgrounds);
    $currentHour = now()->hour; // Get current hour (0-23)
    
    // Determine whether it's the first 12-hour period or the second
    $isFirstPeriod = $currentHour < 12;
    $periodStart = $isFirstPeriod ? 0 : 12; // 0-11 or 12-23

    // Assign an image based on the time slot
    $slotDuration = 12 / $totalImages; // How long each image should be shown
    $imageIndex = floor(($currentHour - $periodStart) / $slotDuration);
    $selectedImage = $backgrounds[$imageIndex]['image'] ?? $backgrounds[0]['image']; // Fallback to the first image
@endphp

<!-- Hero Start -->
<section id="{{$block}}" class="relative py-36  bg-cover jarallax " data-jarallax data-speed="0.5" style="background-image: url('{{asset('storage/'.$backgrounds[0]['image'])}}')">
    <div class="absolute inset-0 bg-slate-900/40"></div>
    <div class="container relative">
        <div class="grid lg:grid-cols-12 md:grid-cols-2 mt-10 items-center gap-6">
            <div class="lg:col-span-7">
                <h5 class="text-3xl font-dancing text-white">Find Your Ideal Stay</h5>
                <h4 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-6xl mb-6 mt-5">
                {{$title}}   
                </h4>
                <p class="text-white/70 text-xl max-w-xl">{{$description}}</p>

                <div class="mt-6">
                   @foreach ($buttons as $button)

                     @if ($button['type'] === 'text')
                         <a href="{{$button['action']=='redirect' ? $button['url']:('#'.$button['url'])}}"
                         class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">
                            {{$button['button_text']}}
                         </a>
                     @endif
                     @if ($button['type'] === 'icon')
                          <a href="{{$button['url']}}" 
                                class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-red-500 bg-red-500 text-white ms-1 lightbox">
                                  @svg($button['icon'], ['style' => 'width:20px','class' => 'ms-1'])
                          </a>
                     @endif
                     @if ($button['type'] === 'icontext')
                         <a href="{{$button['url']}}"
                         class="py-2 px-5 inline-flex items-center tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md"> 
                            {{$button['button_text']}}
                            @svg($button['icon'], ['style' => 'width:20px','class' => 'ms-1'])
                         </a>
                     @endif
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-5">
                <div
                    class="bg-white dark:bg-slate-900 rounded-xl shadow dark:shadow-gray-800 p-6 z-10 relative lg:ms-10">
                    <h4 class="mb-5 text-2xl font-semibold">Searchs Your Destinations</h4>
                    @livewire('destination-pages-form')
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->