<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Hero2 extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('hero2')
            ->schema([
                TextInput::make('title'),
                Repeater::make('backgrounds')->schema([
                    FileUpload::make('image')
                        ->image()
                        ->optimize('webp')
                        ->directory('hero-bg')
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
                ])
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}