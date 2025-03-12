@aware(['page'])

@props([
    'cover',
    'faqs'
])
<style>
    /* Elegant unordered list styles */
    #accordion-collapse ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #accordion-collapse  ul li {
        position: relative;
        padding-left: 1.5rem;
        margin-bottom: 0.5rem;
        font-size: 1rem;
        color: #4B5563; /* Slate Gray */
        font-weight: 500;
    }

    #accordion-collapse  ul li::before {
        content: "•"; /* Bullet point */
        position: absolute;
        left: 0;
        top: 0;
        color: #EF4444; /* Red-500 */
        font-size: 1.2rem;
        font-weight: bold;
    }

    /* Elegant blockquote styles */
    #accordion-collapse blockquote {
        border-left: 4px solid #EF4444; /* Red-500 */
        padding-left: 1rem;
        margin: 1rem 0;
        font-style: italic;
        color: #374151; /* Gray-700 */
        font-size: 1.125rem;
        line-height: 1.6;
        background: #F3F4F6; /* Gray-100 */
        padding: 1rem;
        border-radius: 0.375rem;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.05);
    }

    #accordion-collapse blockquote::before {
        content: "❝";
        font-size: 2rem;
        color: #EF4444; /* Red-500 */
        font-weight: bold;
        line-height: 0;
        margin-right: 0.5rem;
    }

    #accordion-collapse  blockquote::after {
        content: "❞";
        font-size: 2rem;
        color: #EF4444; /* Red-500 */
        font-weight: bold;
        line-height: 0;
        margin-left: 0.5rem;
    }
</style>


<section class="relative md:py-24 py-16">
    <div class="container relative md:mt-24 mt-16">
        <div class="grid grid-cols-1 pb-6 text-center">
            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Frequently Asked Questions</h3>

            <p class="text-slate-400 max-w-xl mx-auto">These are some of the most frequently asked questions about this destination on out platform.</p>
        </div><!--end grid-->

        <div class="relative grid md:grid-cols-12 grid-cols-1 items-center mt-6 gap-6">
            <div class="md:col-span-6 bg-cover rounded-lg overflow-hidden jarallax " data-jarallax data-speed="0.5"  style="height:100%;background-image: url('{{asset($cover)}}')">
                {{-- <div class="jarallax">
                    <picture class="jarallax-img">
                        <source media="..." srcset="{{asset($cover)}}">
                          <img src="{{asset($cover)}}" class="w-full  object-cover rounded-md shadow dark:shadow-gray-800" alt="">
                    </picture>
                  </div> --}}
            </div><!--end col-->

            <div class="md:col-span-6">
                <div id="accordion-collapse" data-accordion="collapse">
                    @foreach ($faqs as $index=>$faq)
                        <div class="relative shadow dark:shadow-gray-800 rounded-md overflow-hidden">
                            <h2 class="text-base font-semibold" id="accordion-collapse-heading-1">
                                <button type="button" class="flex justify-between items-center p-5 w-full font-medium text-start" data-accordion-target="#accordion-collapse-body-{{$index}}" aria-expanded="true" aria-controls="accordion-collapse-body-{{$index}}">
                                    <span>{{$faq['question']}}</span>
                                    <svg data-accordion-icon class="w-4 h-4 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-{{$index}}" class="hidden" aria-labelledby="accordion-collapse-heading-{{$index}}">
                                <div class="p-5">
                                    {!! $faq['answer'] !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                 </div>
            </div><!--end col-->
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->