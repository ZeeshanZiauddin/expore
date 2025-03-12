<footer class="footer bg-dark-footer relative text-gray-200 dark:text-gray-200">    
    <div class="container relative">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="py-[60px] px-0">
                    <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
                        <div class="lg:col-span-3 md:col-span-12">
                            <a href="#" class="text-[22px] focus:outline-none">
                                <img src="{{asset('assets/images/logo-light.png')}}" alt="">
                            </a>
                            <p class="mt-6 text-gray-300">Planning for a trip? We will organize your trip with the best places and within best budget! Just give us a query and leave the rest to our team.</p>
                    
                        </div><!--end col-->

                        <div class="lg:col-span-3 md:col-span-4">
                            <div class="lg:ms-8">
                                <h5 class="tracking-[1px] text-gray-100 font-semibold">Office</h5>
                                <h5 class="tracking-[1px] text-gray-100 mt-6">Explore Flights UK</h5>

                                <div class="flex mt-4">
                                    <i data-feather="map-pin" class="size-4 text-red-500 me-2 mt-1"></i>
                                    <div class="">
                                        <h6 class="text-gray-300">102 Piggott street Famworth,<br>Bolton, Bl4 9NS,</br> United Kingdom</h6>
                                    </div>
                                </div>

                                <div class="flex mt-4">
                                    <i data-feather="mail" class="size-4 text-red-500 me-2 mt-1"></i>
                                    <div class="">
                                        <a href="mailto:contact@example.com" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">info@exploreflights.co.uk</a>
                                    </div>
                                </div>
                
                                <div class="flex mt-4">
                                    <i data-feather="phone" class="size-4 text-red-500 me-2 mt-1"></i>
                                    <div class="">
                                        <a href="tel:+442039300075" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">+44203-930-007-5</a>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
        
                        <div class="lg:col-span-3 md:col-span-4">
                            <div class="lg:ms-8">
                                <h5 class="tracking-[1px] text-gray-100 font-semibold">Company</h5>
                                <ul class="list-none footer-list mt-6">
                                    <li><a href="/" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Book Flights</a></li>
                                    <li class="mt-2"><a href="/contact-us" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Contact us</a></li>                          
                                    <li class="mt-2"><a href="/about-us" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> About us</a></li>
                                    <li class="mt-2"><a href="/about-us" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Our Team</a></li>

                                </ul>
                            </div>
                        </div><!--end col-->

                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-gray-100 font-semibold">Newsletter</h5>
                            <p class="mt-6">Sign up and receive the latest tips via email.</p>
                     
                            <form method="post" action="{{ route('filamentblog.post.subscribe') }}">
                                @csrf
                                <div class="grid grid-cols-1">
                                    <div class="my-3">
                                        <label class="form-label">Write your email <span class="text-red-600">*</span></label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                            <input type="email" value="{{ old('email') }}" class="ps-12 rounded w-full py-2 px-3 h-10 bg-gray-800 border-0 text-gray-100 focus:shadow-none focus:ring-0 placeholder:text-gray-200 outline-none" placeholder="Email" name="email" required="">
                                            @error('email')
                                                <span class="text-xs text-red-500">{{ $message }}</span>
                                            @enderror
                                            @if (session('success'))
                                                <span class="text-green-500">{{ session('success') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="submit" id="submitsubscribe" name="send" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Subscribe</button>
                                </div>
                            </form>
                        </div><!--end col-->
                    </div><!--end grid-->
                </div><!--end col-->
            </div>
        </div><!--end grid-->
    </div><!--end container-->

   
</footer><!--end footer-->
<!-- Footer End -->
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
<!-- Back to top --> 
