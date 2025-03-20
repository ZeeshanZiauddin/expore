<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QueryResource\Pages;
use App\Filament\Resources\QueryResource\RelationManagers;
use App\Models\Query;
use Auth;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QueryResource extends Resource
{
    protected static ?string $model = Query::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('status')
                    ->options([
                        'oneway' => 'One Way',
                        'return' => 'Return',
                    ])
                    ->required(),

                Select::make('from')
                    ->relationship('fromDestination', 'city')
                    ->required(),

                Select::make('to')
                    ->relationship('toDestination', 'city')
                    ->required(),

                DatePicker::make('departure_date')->required(),
                DatePicker::make('return_date')->native(false),

                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required(),
                TextInput::make('phone')->required(),

                TextInput::make('passengers')->numeric()->required(),
                Select::make('flight_class')
                    ->options([
                        'economy' => 'Economy',
                        'business' => 'Business',
                        'first' => 'First Class',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')
                    ->searchable()
                    ->formatStateUsing(
                        fn($state, $record) =>
                        $record->awailed_by == Auth::id() ? $state : preg_replace('/(.{2}).+(@.+)/', '$1******$2', $state)
                    ),

                TextColumn::make('phone')
                    ->formatStateUsing(
                        fn($state, $record) =>
                        $record->awailed_by == Auth::id() ? $state : preg_replace('/(.{2}).+(.{2})/', '$1*******$2', $state)
                    ),
                TextColumn::make('fromDestination.city')->label('From')->sortable(),
                TextColumn::make('toDestination.city')->label('To')->sortable(),
                TextColumn::make('departure_date')->date(),
                TextColumn::make('return_date')->date(),
                TextColumn::make('passengers')->sortable(),
                TextColumn::make('flight_class')
                    ->sortable()
                    ->badge()
                    ->colors([
                        'economy' => 'gray',
                        'business' => 'warning',
                        'first_class' => 'primary',
                    ])
                    ->formatStateUsing(fn($state) => match ($state) {
                        'economy' => 'Economy',
                        'business' => 'Business',
                        'first_class' => 'First Class',
                        default => $state,
                    }),
                TextColumn::make('status')
                    ->sortable()
                    ->label('type')
                    ->badge()
                    ->colors([
                        'oneway' => 'warning',
                        'return' => 'primary',
                    ])
                    ->formatStateUsing(fn($state) => match ($state) {
                        'oneway' => 'One Way',
                        'return' => 'Return',
                        default => $state,
                    }),
                TextColumn::make('awailed_by')->label('Awaited By')->formatStateUsing(fn($state) => $state ? \App\Models\User::find($state)?->name : 'Not Set'),


            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('markAwaited')
                    ->label('Awail Now')
                    ->icon('heroicon-c-hand-thumb-up')
                    ->action(function ($record) {
                        $record->awailed_by = Auth::id();
                        $record->save();
                    })
                    ->hidden(fn($record) => !is_null($record->awailed_by))
                    ->requiresConfirmation()
                    ->successNotificationTitle('Marked as Awailed'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListQueries::route('/'),
            'create' => Pages\CreateQuery::route('/create'),
            'edit' => Pages\EditQuery::route('/{record}/edit'),
        ];
    }
}