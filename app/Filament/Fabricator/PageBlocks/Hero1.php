<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use TomatoPHP\FilamentIcons\Components\IconPicker;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Hero1 extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('hero1')
            ->schema([
                Section::make('Hero1 Fields')
                    ->schema([
                        TextInput::make('block')->default('hero')->readOnly(),
                        TextInput::make('title')->required()->placeholder('Block Title...'),
                        TextInput::make('description')->required()->placeholder('Block Description...'),
                        Repeater::make('backgrounds')
                            ->schema([
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
                                TextInput::make('alt')->label('Alt Text')->placeholder('Image Alternate Text'),
                            ])
                            ->collapsible(),
                        Repeater::make('buttons')
                            ->schema([
                                Select::make('action')->options([
                                    'url' => 'Redirect',
                                    'scroll' => 'Scroll',
                                ])->reactive()->default('scroll'),
                                TextInput::make('url')
                                    ->label(fn($get) => $get('action') === 'url' ? 'Url' : 'Block ID')
                                    ->prefixIcon(fn($get) => $get('action') === 'url' ? 'heroicon-m-globe-alt' : 'heroicon-o-hashtag')
                                    ->placeholder(function ($get) {
                                        $get('action') === 'scroll' ? 'Enter Block id...' : 'Enter page url...';
                                    }),

                                Select::make('type')->options([
                                    'icon' => 'Icon',
                                    'text' => 'Text',
                                    'icontext' => 'Icon + Text',
                                ])->default('scroll')->reactive(),

                                IconPicker::make('icon')
                                    ->placeholder('Select Icon to Show with the button...')
                                    ->label('Icon')
                                    ->visible(fn($get) => in_array($get('type'), ['icon', 'icontext'])),

                                TextInput::make('button_text')
                                    ->placeholder('Enter button text...')
                                    ->visible(fn($get) => in_array($get('type'), ['text', 'icontext'])),

                            ])
                            ->collapsible(),

                    ])
                    ->collapsible()
                    ->collapsed(true),
            ]);
    }

    public static function mutateData(array $data): array
    {


        return $data;
    }
}