<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AirportResource\Pages;
use App\Models\Airport;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables\Filters\SelectFilter;

class AirportResource extends Resource
{
    protected static ?string $model = Airport::class;
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('code')
                    ->required()
                    ->maxLength(10)
                    ->unique(Airport::class, 'code'),

                TextInput::make('city')
                    ->required()
                    ->maxLength(255),

                TextInput::make('country')
                    ->required()
                    ->maxLength(255),

                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->default(auth()->user()->id)
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('code')->sortable()->searchable(),
                TextColumn::make('city')->sortable()->searchable(),
                TextColumn::make('country')->sortable()->searchable(),
                TextColumn::make('user.name')->label('Created By')->sortable(),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                SelectFilter::make('country')
                    ->label('Filter by Country')
                    ->searchable()
                    ->options(
                        Airport::query()
                            ->distinct()
                            ->pluck('country', 'country')
                            ->toArray()
                    ),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAirports::route('/'),
            //'create' => Pages\CreateAirport::route('/create'),
            //'edit' => Pages\EditAirport::route('/{record}/edit'),
        ];
    }
}