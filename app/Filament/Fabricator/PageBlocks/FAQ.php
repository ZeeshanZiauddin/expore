<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Storage;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class FAQ extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('f-a-q')
            ->schema([
                Section::make('FAQ Section')->schema([
                    FileUpload::make('cover')
                        ->image()
                        ->optimize('webp')
                        ->directory('faq-covers')
                        ->disk('public')
                        ->visibility('public')
                        ->previewable(true),
                    Repeater::make('faqs')
                        ->schema([
                            TextInput::make('question'),
                            RichEditor::make('answer'),
                        ])
                        ->collapsible(),
                ])->collapsible()
                    ->collapsed(true)
            ]);
    }

    public static function mutateData(array $data): array
    {
        $data['cover'] = Storage::url($data['cover']);
        return $data;
    }
}