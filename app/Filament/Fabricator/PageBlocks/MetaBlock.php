<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class MetaBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('meta')
            ->schema([
                Section::make('Meta Information')
                    ->columns(1)
                    ->schema([
                        TextInput::make('title')->label('Title')
                            ->placeholder('Title')
                            ->required(),
                        Textarea::make('description')->label('Description'),
                        TagsInput::make('keywords')
                            ->suggestions([
                                'Explore Flights',
                                'Book Flights',
                                'Cheap Flights',
                                'Affordable Flights',
                                'Flight Deals',
                                'Flight Discounts',
                                'Flight Offers',
                                'Flight Coupons',
                            ]),
                        Fieldset::make('Open Graph')
                            ->schema([
                                TextInput::make('og_title')->label('Title')
                                    ->placeholder('Title'),
                                TextInput::make('og_image')->label('Image')
                                    ->placeholder('Image URL'),
                                Textarea::make('og_description')->label('Description')->columnSpanFull(),

                            ]),
                    ])->collapsible()->collapsed(true)
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}