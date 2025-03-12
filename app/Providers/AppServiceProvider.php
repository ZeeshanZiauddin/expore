<?php

namespace App\Providers;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\ServiceProvider;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentFabricator::registerSchemaSlot('sidebar.after', [
            Section::make('other_details')
                ->label('Other Details')
                ->schema([
                    Select::make('destination_id')
                        ->label('Destination')
                        ->relationship('destination', 'city')
                        ->searchable()
                        ->preload()
                        ->createOptionForm([
                            TextInput::make('city')->required(),
                            TextInput::make('country')->required(),
                            TextInput::make('continent')->required(),
                        ]),
                    Checkbox::make('index')
                        ->label('Index Page')
                        ->default(false),
                ])
        ]);
    }
}