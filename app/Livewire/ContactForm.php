<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\ContactSubmission;
use App\Models\ContactUs;
use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;

class ContactForm extends Component implements HasForms
{
    use \Filament\Forms\Concerns\InteractsWithForms;
    public ?array $data = [];

    public $successMessage = null;

    public function mount(): void
    {
        $this->form->fill();
    }


    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label('Your Name')
                ->required()
                ->maxLength(255),

            TextInput::make('email')
                ->label('Your Email')
                ->email()
                ->required(),

            TextInput::make('phone')
                ->tel()
                ->label('phone')
                ->required()
                ->maxLength(255),

            Textarea::make('message')
                ->label('Message')
                ->required()
                ->rows(3),
        ])->statePath('data');
    }

    public function submit()
    {
        $validated = $this->form->getState();
        ContactUs::create($validated);
        $this->successMessage = 'Thank you for contacting us. We will get back to you soon.';
        $this->reset('data');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}