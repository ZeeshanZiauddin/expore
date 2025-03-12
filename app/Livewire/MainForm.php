<?php

namespace App\Livewire;

use App\Forms\Components\Dropdown;
use App\Forms\Components\PassengerDropdown;
use App\Models\Destination;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Livewire\Component;

class MainForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema(components: [
                ToggleButtons::make('status')
                    ->hiddenLabel()
                    ->inline()
                    ->options([
                        'oneway' => 'One Way',
                        'return' => 'Return',
                    ])
                    ->icons([
                        'oneway' => 'heroicon-m-arrow-right-end-on-rectangle',
                        'return' => 'heroicon-m-arrows-right-left',
                    ])
                    ->default('oneway'),

                Section::make()->schema([
                    Select::make('from')
                        ->options(
                            Destination::query()
                                ->select(['id', 'city', 'country']) // Only fetch required columns
                                ->get()
                                ->mapWithKeys(function ($destination) {
                                    return [
                                        $destination->id => e($destination->city) . ', ' . e($destination->country),
                                    ];
                                })->toArray()
                        )
                        ->prefix(static::TakeoffPlane())
                        ->searchable()
                        ->placeholder('Departure')
                        ->required(),
                    Select::make('to')
                        ->options(
                            Destination::query()
                                ->select(['id', 'city', 'country']) // Only fetch required columns
                                ->get()
                                ->mapWithKeys(function ($destination) {
                                    return [
                                        $destination->id => e($destination->city) . ', ' . e($destination->country),
                                    ];
                                })->toArray()
                        )
                        ->prefix(static::LandingPlane())
                        ->placeholder('Destination')
                        ->searchable()
                        ->required(),
                    DatePicker::make('departure_date')
                        ->default(now())
                        ->minDate(now())
                        ->prefixIcon('heroicon-s-calendar-date-range')
                        ->native(false),
                    DatePicker::make('return_date')
                        ->label('Return')
                        ->prefixIcon('heroicon-s-calendar-date-range')
                        ->minDate(now())
                        ->disabled(fn($get) => $get('status') === 'oneway')
                        ->placeholder('Month Day, Year')
                        ->native(false),
                    TextInput::make('name')
                        ->placeholder('Full Name')
                        ->extraInputAttributes(['class' => 'py-1'])
                        ->required(),
                    TextInput::make('email')
                        ->placeholder('Your Email')
                        ->extraInputAttributes(['class' => 'py-1'])
                        ->required(),
                    TextInput::make('phone')
                        ->placeholder('Phone No.')
                        ->extraInputAttributes(['class' => 'py-1'])

                        ->required(),
                    PassengerDropdown::make('details')->label('Travellers and Class'),

                ])
                    ->compact()
                    ->columns(4),

            ])
            ->statePath('data')
            ->columns(4);
    }



    public function submit(): void
    {
        // dd($this->form->getState());
    }

    public function render(): View
    {
        return view('livewire.main-form');
    }
    private static function TakeoffPlane()
    {
        return new HtmlString('<svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor">
        <path d="M 25.71875 4.78125 C 25.332031 4.816406 24.957031 4.929688 24.59375 5.125 
        L 19.875 7.625 L 13.5 6.0625 L 13.125 5.96875 L 12.75 6.15625 L 10.59375 7.40625 
        L 9.3125 8.15625 L 10.5 9.0625 L 13.21875 11.125 L 9.8125 12.9375 L 6.15625 11.28125 
        L 5.71875 11.09375 L 5.28125 11.3125 L 3.53125 12.25 L 2.375 12.875 L 3.25 13.8125 
        L 8.65625 19.625 L 9.15625 20.21875 L 9.84375 19.84375 L 15 17.09375 L 13.96875 
        22.78125 L 13.625 24.59375 L 15.34375 23.875 L 17.90625 22.78125 L 18.28125 22.625 
        L 18.4375 22.25 L 22.15625 13.21875 L 27.40625 10.40625 C 28.851563 9.628906 29.433594 
        7.789063 28.65625 6.34375 C 28.269531 5.621094 27.609375 5.128906 26.875 4.90625 
        C 26.507813 4.796875 26.105469 4.746094 25.71875 4.78125 Z M 25.90625 6.78125 C 26.03125 
        6.773438 26.160156 6.777344 26.28125 6.8125 C 26.523438 6.886719 26.742188 7.035156 
        26.875 7.28125 C 27.140625 7.777344 26.964844 8.359375 26.46875 8.625 L 20.875 
        11.65625 L 20.5625 11.8125 L 20.4375 12.15625 L 16.71875 21.09375 L 16.28125 
        21.28125 L 17.34375 15.375 L 17.71875 13.34375 L 15.90625 14.3125 L 9.59375 
        17.71875 L 5.625 13.40625 L 5.78125 13.3125 L 9.4375 14.9375 L 9.90625 15.15625 
        L 10.3125 14.90625 L 25.53125 6.875 C 25.65625 6.808594 25.78125 6.789063 25.90625 
        6.78125 Z M 13.375 8.09375 L 17.21875 9.03125 L 15.15625 10.09375 L 12.90625 
        8.375 Z M 3 26 L 3 28 L 29 28 L 29 26 Z"></path>
    </svg>');
    }
    private static function LandingPlane()
    {
        return new HtmlString('<svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor"><path d="M 3.40625 3.96875 L 3.34375 5.25 L 3 14.03125 L 2.96875 14.8125 L 3.71875 15.03125 L 10.125 16.96875 L 4.6875 20.75 L 3.15625 21.8125 L 4.875 22.5 L 7.71875 23.625 L 8.09375 23.78125 L 8.46875 23.625 L 18.46875 19.46875 L 24.875 21.40625 C 26.5625 21.914063 28.367188 20.933594 28.875 19.25 C 29.382813 17.5625 28.402344 15.757813 26.71875 15.25 L 21.03125 13.5 L 17.25 7.25 L 17.03125 6.90625 L 16.65625 6.78125 L 14 6.0625 L 12.53125 5.6875 L 12.75 7.1875 L 13.28125 11.09375 L 9.03125 9.78125 L 7.40625 5.59375 L 7.21875 5.125 L 6.75 4.96875 L 4.625 4.34375 Z M 5.28125 6.625 L 5.71875 6.75 L 7.3125 10.9375 L 7.46875 11.40625 L 7.9375 11.53125 L 26.125 17.15625 C 26.777344 17.351563 27.132813 18.007813 26.9375 18.65625 C 26.742188 19.308594 26.085938 19.664063 25.4375 19.46875 L 18.6875 17.4375 L 18.34375 17.34375 L 18.03125 17.46875 L 8.09375 21.625 L 7.34375 21.3125 L 12.96875 17.4375 L 14.6875 16.25 L 12.6875 15.65625 L 5.03125 13.34375 Z M 14.90625 8.40625 L 15.71875 8.625 L 18.15625 12.59375 L 15.34375 11.75 Z M 20.5 21 C 19.671875 21 19 21.671875 19 22.5 C 19 23.328125 19.671875 24 20.5 24 C 21.328125 24 22 23.328125 22 22.5 C 22 21.671875 21.328125 21 20.5 21 Z M 3 26 L 3 28 L 29 28 L 29 26 Z"></path></svg>');
    }
}