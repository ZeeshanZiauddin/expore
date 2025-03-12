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

                Textarea::make('html_content')
                    ->required()
                    ->label('HTML Content')
                    ->helperText('Paste your email HTML here'),

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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('preview')
                    ->label('Preview Template')
                    ->modalHeading('Template Preview')
                    ->modalContent(
                        function ($record) {
                            return View::make('components.emailPreview', ['html' => $record->html_content]);
                        }
                    )
                    ->modalWidth('3xl')
                ,
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