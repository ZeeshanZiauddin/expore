<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class DestinationDetails extends PageBlock
{
    //
    public static function getBlockSchema(): Block
    {
        return Block::make('destination-details')
            ->schema([
                Section::make('Destination Details')
                    ->schema([
                        Repeater::make('backgrounds')
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->optimize('webp')
                                    ->directory('featured-images')
                                    ->required()
                                    ->disk('public')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '16:9',
                                    ])
                                    ->imageEditorMode(2)
                                    ->visibility('public')
                                    ->previewable(true),
                            ]),
                        TextInput::make('Title')->required(),
                    ])->collapsible()
                    ->collapsed(true),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}