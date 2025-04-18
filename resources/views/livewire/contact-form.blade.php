<div class="bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-800 p-6">
    <h3 class="mb-6 text-2xl leading-normal font-semibold">Get in touch !</h3>
      @if ($successMessage)
        <div class="mb-4 p-2 text-green-500 rounded-lg shadow-sm">
            {{ $successMessage }}
        </div>
    @endif

    <form id="myForm" wire:submit.prevent="submit">
        {{ $this->form }}
        
        <button type="submit"
        class="py-1 px-5 h-10 mt-3 w-full align-left duration-500 text-base text-center bg-red-500  text-white rounded-md cursor-pointer col-span-1 hover:bg-red-400" >
           <svg wire:loading wire:target="submit" class="animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
               <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
           </svg>
           <span wire:loading.remove wire:target="submit">Submit</span>
           <span wire:loading wire:target="submit">Submitting...</span>
       </button>
    </form>
</div>
