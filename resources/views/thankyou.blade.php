@extends('layouts.alert')

@section('content')


  <!-- Loader Start -->
         <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> 
 <!-- Loader End -->        
        <section class="relative h-screen flex items-center justify-center text-center  bg-no-repeat bg-center bg-cover" style="background-image: url('{{ asset('assets/images/bg/about-bg.jpg') }}');">
            <div class="absolute inset-0 bg-black/25"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/40 to-black"></div>
            <div class="container relative">
                <div class="grid grid-cols-1">
                    <img src="assets/images/logo-light.png" class="mx-auto" alt="">
                    <h1 class="text-white mb-6 mt-8 md:text-5xl text-3xl font-bold">Thank you for choosing us we will get back to you soon</h1>
                    <p class="text-white/70 text-lg max-w-xl mx-auto">Start working with Travosy that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div><!--end grid-->

                <div class="grid grid-cols-1 mt-10">
                    <div class="text-center">
                        <span id="maintenance" class="timer text-white text-[56px] tracking-[1px]"></span>
                        <span class="block text-base font-semibold uppercase text-white">Minutes</span>
                    </div>
                </div><!--end grid-->

                <div class="grid grid-cols-1 mt-6">
                    
                    <div class="text-center subcribe-form">
                        @livewire('newsletter-component', [
                            'formClass' => 'relative mx-auto max-w-xl',
                            'inputClass' => 'py-4 pe-40 ps-6 w-full h-[50px] outline-none text-black dark:text-white rounded-full bg-white/70 dark:bg-slate-900/70 border border-gray-100 dark:border-gray-700',
                            'buttonClass' => 'py-2 px-5 flex tracking-wide align-middle items-center duration-500 text-base text-center absolute top-[2px] end-[3px] h-[46px] bg-red-500 text-white rounded-full',
                            'spinnerClass' => 'animate-spin h-5 w-5 me-2 text-white',
                            'messageClass' => 'mt-2 text-green-500 text-center'
                        ])
                    </div>
          iv><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->

        <div class="fixed bottom-3 end-3">
            <a href="/" class="back-button size-8 inline-flex items-center justify-center tracking-wide border align-middle duration-500 text-base text-center bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white rounded-md"><i data-feather="arrow-left" class="size-4"></i></a>
        </div>

        <!-- Switcher -->
        <div class="fixed top-1/4 -left-2 z-50">
            <span class="relative inline-block rotate-90">
                <input type="checkbox" class="checkbox opacity-0 absolute" id="chk">
                <label class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">
                    <i data-feather="moon" class="w-[18px] h-[18px] text-yellow-500"></i>
                    <i data-feather="sun" class="w-[18px] h-[18px] text-yellow-500"></i>
                    <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] w-7 h-7"></span>
                </label>
            </span>
        </div>

 
 
        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fixed hidden text-lg rounded-md z-10 bottom-5 end-5 size-8 text-center bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white justify-center items-center"><i class="mdi mdi-arrow-up"></i></a>
      
@endsection