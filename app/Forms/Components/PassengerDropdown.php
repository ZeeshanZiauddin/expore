<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class PassengerDropdown extends Field
{
    protected string $view = 'forms.components.passenger-dropdown';

    protected function setUp(): void
    {
        parent::setUp();

        $this->default([
            'passenger_count' => 1,
            'flight_class' => 'Economy',
        ]);

        $this->schema([
            TextInput::make('passenger_count')
                ->label('Number of Passengers')
                ->default(1)
                ->minValue(1)
                ->maxValue(10)
                ->extraInputAttributes(['class' => 'py-1'])
                ->suffixAction(
                    fn($get, $set) => \Filament\Forms\Components\Actions\Action::make('increase')
                        ->icon('heroicon-o-plus')
                        ->action(fn() => $set('passenger_count', $get('passenger_count') + 1))
                )
                ->prefixAction(
                    fn($get, $set) => \Filament\Forms\Components\Actions\Action::make('decrease')
                        ->icon('heroicon-o-minus')
                        ->action(fn() => $set('passenger_count', max(1, $get('passenger_count') - 1)))
                ),
            Select::make('flight_class')
                ->label('Flight Class')
                ->options([
                    'economy' => 'Economy',
                    'business' => 'Business',
                    'first_class' => 'First Class',
                ])
                ->native(false)
                ->default('economy')
                ->required(),
        ]);
    }
}