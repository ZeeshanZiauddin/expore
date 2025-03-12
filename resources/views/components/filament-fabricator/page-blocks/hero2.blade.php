@aware(['page'])
@props([
    'title',
    'backgrounds'
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

<style>
    .container-padding{
     padding-top: 9rem;
     padding-bottom: 2rem;
    }
    .hero-heading{
     font-size: 4rem;
     font-weight: 900;
    }
</style>

<section
    class="relative table w-full items-center container-padding bg-top bg-no-repeat bg-cover" style="background-image: url('{{asset('storage/'.$backgrounds[0]['image'])}}')">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 pb-2  mt-4 ">
            <h3 class="hero-heading  text-white pb-4">{{$title}}</h3>
            @livewire('main-form')
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Hero -->