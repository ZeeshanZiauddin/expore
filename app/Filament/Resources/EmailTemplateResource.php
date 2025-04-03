<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmailTemplateResource\Pages;
use App\Filament\Resources\EmailTemplateResource\RelationManagers;
use App\Models\EmailTemplate;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use InfinityXTech\FilamentUnlayer\Forms\Components\SelectTemplate;
use InfinityXTech\FilamentUnlayer\Forms\Components\Unlayer;

class EmailTemplateResource extends Resource
{
    protected static ?string $model = EmailTemplate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('name')
                    ->required()
                    ->label('Template Name'),

                TextInput::make('blade_path')
                    ->disabled()
                    ->label('Blade File Path')
                    ->helperText('Generated automatically'),

                // Textarea::make('html_content')
                //     ->required()
                //     ->label('HTML Content')
                //     ->helperText('Paste your email HTML here'),
                Unlayer::make('html_content')->required(),

                Repeater::make('fields')
                    ->schema([
                        TextInput::make('key')->required()->label('Field Key'),
                        TextInput::make('label')->required()->label('Field Label'),
                    ])
                    ->label('Dynamic Fields'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('blade_path')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([

                Tables\Actions\Action::make('preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('Template Preview')
                    ->modalContent(fn(EmailTemplate $record) => view('components.emailPreview', ['html' => $record->html_content['html']]))
                    ->slideOver()
                    ->modalWidth('5xl'),
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    public static function renderPreview($htmlContent)
    {
        return "<div style='padding:20px; border:1px solid #ddd; background:#f9f9f9;'>
                    $htmlContent
                </div>";
    }
    private static function generateBladeFile($name, $html)
    {
        $fileName = Str::slug($name) . '.blade.php';
        $path = "emails/templates/$fileName";

        // Save HTML content as Blade file
        Storage::disk('views')->put($path, $html);

        return str_replace('.blade.php', '', $path); // Store path without extension
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmailTemplates::route('/'),
            'create' => Pages\CreateEmailTemplate::route('/create'),
            'edit' => Pages\EditEmailTemplate::route('/{record}/edit'),
        ];
    }
}