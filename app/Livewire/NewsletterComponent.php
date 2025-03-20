<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Newsletter;

class NewsletterComponent extends Component
{
    public $email;
    public $loading = false;
    public $message;
    public $formClass;
    public $inputClass;
    public $buttonClass;
    public $spinnerClass;
    public $messageClass;

    public function mount(
        $formClass = '',
        $inputClass = '',
        $buttonClass = '',
        $spinnerClass = '',
        $messageClass = ''
    ) {
        $this->formClass = $formClass;
        $this->inputClass = $inputClass;
        $this->buttonClass = $buttonClass;
        $this->spinnerClass = $spinnerClass;
        $this->messageClass = $messageClass;
    }

    public function submit()
    {
        $this->loading = true; // Show spinner

        // Subscribe user directly using Newsletter model
        $response = Newsletter::subscribe($this->email);

        if ($response['status'] === 'success') {
            $this->message = 'Subscribed successfully!';
            $this->reset('email'); // Clear input field
        } else {
            $this->message = $response['message'];
        }

        $this->loading = false; // Hide spinner
    }

    public function render()
    {
        return view('livewire.newsletter-component');
    }
}