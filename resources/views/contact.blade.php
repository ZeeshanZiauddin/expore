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
                aria-current="page">Contact Us</li>
        </ul>
    </div>
</section>

        <!-- Start Section-->
        <section class="relative lg:py-24 py-16">
            <div class="container">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6">
                    <div class="lg:col-span-7 md:col-span-6">
                        <img src="assets/images/plane-passenger-2.svg" class="w-full max-w-[500px] mx-auto" alt="">
                    </div>

                    <div class="lg:col-span-5 md:col-span-6">
                        <div class="lg:ms-5">
                            <div class="bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-800 p-6">
                                <h3 class="mb-6 text-2xl leading-normal font-semibold">Get in touch !</h3>

                                <form method="post" name="myForm" id="myForm" onsubmit="return validateForm()">
                                    <p class="mb-0" id="error-msg"></p>
                                    <div id="simple-msg"></div>
                                    <div class="grid lg:grid-cols-12 grid-cols-1 gap-3">
                                        <div class="lg:col-span-6">
                                            <label for="name" class="font-semibold">Your Name:</label>
                                            <input name="name" id="name" type="text" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Name :">
                                        </div>
        
                                        <div class="lg:col-span-6">
                                            <label for="email" class="font-semibold">Your Email:</label>
                                            <input name="email" id="email" type="email" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Email :">
                                        </div>

                                        <div class="lg:col-span-12">
                                            <label for="subject" class="font-semibold">Your Question:</label>
                                            <input name="subject" id="subject" class="mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Subject :">
                                        </div>
    
                                        <div class="lg:col-span-12">
                                            <label for="comments" class="font-semibold">Your Comment:</label>
                                            <textarea name="comments" id="comments" class="mt-2 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Message :"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" id="submit" name="send" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md mt-2">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end container-->
            
            <div class="container lg:mt-24 mt-16">
                <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-6">
                    <div class="text-center px-6">
                        <div class="relative text-transparent">
                            <div class="size-20 bg-red-500/5 text-red-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i data-feather="phone"></i>
                            </div>
                        </div>

                        <div class="content mt-7">
                            <h5 class="h5 text-lg font-semibold">Phone</h5>
                            <p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>
                            
                            <div class="mt-5">
                                <a href="tel:+442039300075" class="text-red-500 font-medium">+44203-930-007-5</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center px-6">
                        <div class="relative text-transparent">
                            <div class="size-20 bg-red-500/5 text-red-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i data-feather="mail"></i>
                            </div>
                        </div>

                        <div class="content mt-7">
                            <h5 class="h5 text-lg font-semibold">Email</h5>
                            <p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>
                            
                            <div class="mt-5">
                                <a href="mailto:contact@example.com" class="text-red-500 font-medium">info@exploreflights.co.uk</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center px-6">
                        <div class="relative text-transparent">
                            <div class="size-20 bg-red-500/5 text-red-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-sm dark:shadow-gray-800">
                                <i data-feather="map-pin"></i>
                            </div>
                        </div>

                        <div class="content mt-7">
                            <h5 class="h5 text-lg font-semibold">Location</h5>
                            <p class="text-slate-400 mt-3">102 Piggott street Famworth, Bolton,<br> Bl4 9NS, United Kingdom</p>
                            
                            <div class="mt-5">
                                <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                                data-type="iframe" class="video-play-icon read-more lightbox text-red-500 font-medium">View on Google map</a>
                            </div>
                        </div>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End Section-->
         <!-- Google Map -->
         <div class="container-fluid relative mt-20">
            <div class="grid grid-cols-1">
                <div class="w-full leading-[0] border-0">
                 
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2370.8064088095325!2d-2.405067123399632!3d53.543370772347096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487ba621dcfd357f%3A0xde78144245348f04!2s102%20Piggott%20St%2C%20Farnworth%2C%20Bolton%20BL4%209NS%2C%20UK!5e0!3m2!1sen!2s!4v1738076483340!5m2!1sen!2s"  style="border:0" class="w-full h-[500px]" allowfullscreen></iframe>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
        <!-- Google Map -->

@endsection