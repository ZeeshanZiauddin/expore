<?php

namespace App\Providers;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\ServiceProvider;
use Str;
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
            Section::make('Other Details')
                ->schema([
                    FileUpload::make('featured_image')
                        ->image()
                        ->disk('public')
                        ->directory(fn($get) => 'pages/' . Str::slug(strtolower($get('title'))) . '/featured-images')
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('16:10')
                        ->imageResizeTargetWidth('512')
                        ->imageResizeTargetHeight('320')->required(),
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
                    Toggle::make('index')
                        ->label('Index Page')
                        ->default(false),

                ])
        ]);
    }
}