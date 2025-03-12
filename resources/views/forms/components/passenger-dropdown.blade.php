<x-dynamic-component 
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ 
            open: false, 
            passengerCount: @entangle($getStatePath() . '.passenger_count'), 
            flightClass: @entangle($getStatePath() . '.flight_class')
        }"
        class="relative  rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 [&:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 ring-gray-950/10 dark:ring-white/20 [&:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 "
    >
        <!-- Dropdown Button -->
        <a 
            @click="open = !open"
            class="w-full px-4 py-1 text-left bg-white rind-1 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 flex justify-between items-center"
        >
            <span><span x-text="passengerCount"></span> travellers, <span x-text="flightClass"></span></span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-200" :class="{ 'rotate-180': open }" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </a>

        <!-- Dropdown Content -->
        <div 
            x-show="open" 
            @click.away="open = false"
            class="absolute left-0 mt-2 w-full bg-white border rounded-lg shadow-lg p-4 z-10"
        >
        <div>
            {{ $getChildComponentContainer() }}
        </div>
        

           
        </div>
    </div>
</x-dynamic-component>
