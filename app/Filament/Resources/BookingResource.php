<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    DatePicker::make('booking_date')->required()
                        ->native(false)
                        ->default(today()),

                    Select::make('user_id')->label('Agent')->relationship('user', 'name')->required()->searchable()->default(auth()->user()->id),
                    Select::make('supplier_id')->relationship('supplier', 'name')->required()->searchable()->preload(),
                    TextInput::make('supplier_ref')->required(),
                    TextInput::make('brand')->required(),
                ])->compact()->columns(5),

                Section::make('Payment Details')->schema([
                    Select::make('payment_method')
                        ->options(['card' => 'Card', 'bank' => 'Bank'])
                        ->default('card')
                        ->extraInputAttributes(['style' => 'padding-top: 0.275rem; padding-bottom: 0.275rem;'])
                        ->nullable()->reactive(),
                    DatePicker::make('payment_due_date')->nullable()->native(false),
                    TextInput::make('payment_amount')->numeric()->required()->default(0),
                    TextInput::make('bank_name')->nullable()->visible(fn($get) => $get('payment_method') === 'bank'),
                    TextInput::make('card_no')->nullable()->visible(fn($get) => $get('payment_method') === 'card'),
                    TextInput::make('card_expire')->nullable()->visible(fn($get) => $get('payment_method') === 'card')->mask('99/99'),
                    TextInput::make('card_cvv')->password()->nullable()->visible(fn($get) => $get('payment_method') === 'card') // Encrypt before storing
                        ->maxLength(4),
                ])->columns(6),

                Section::make('Customer Details')->schema([
                    TextInput::make('customer_name')->nullable()->placeholder('Customer Name'),
                    TextInput::make('customer_email')->email()->nullable()->placeholder('Customer Email'),
                    TextInput::make('customer_phone')->nullable()->placeholder('Customer Landline'),
                    TextInput::make('customer_mobile')->nullable()->placeholder('Customer phone'),
                ])->columns(4),

                Section::make('Flight Details')->schema([
                    Select::make('departure_airport_id')
                        ->label('Departure Airport')
                        ->relationship('departureAirport', 'id')
                        ->getOptionLabelFromRecordUsing(fn($record) => "{$record->city} ({$record->code})")
                        ->searchable()
                        ->preload()
                        ->nullable(),
                    Select::make('destination_airport_id')
                        ->label('Destination Airport')
                        ->relationship('destinationAirport', 'id')
                        ->getOptionLabelFromRecordUsing(fn($record) => "{$record->city} ({$record->code})")
                        ->searchable()
                        ->nullable(),
                    Select::make('flight_type')->options([
                        'one_way' => 'One Way',
                        'return' => 'Return',
                    ])->nullable(),
                    Select::make('gds')->nullable(),
                    Select::make('flight_class')->options([
                        'economy' => 'Economy',
                        'business' => 'Business',
                        'first_class' => 'First Class',
                    ])->nullable(),
                    TextInput::make('segment')->nullable(),
                    Select::make('going_stopover_id')->nullable()->label('Return Stopover')->relationship('destinationAirport', 'id')
                        ->getOptionLabelFromRecordUsing(fn($record) => "{$record->city} ({$record->code})")
                        ->searchable()->nullable(),
                    Select::make('return_stopover_id')->label('Return Stopover')->relationship('destinationAirport', 'id')
                        ->getOptionLabelFromRecordUsing(fn($record) => "{$record->city} ({$record->code})")
                        ->searchable()->nullable(),
                    DateTimePicker::make('departure_date_time')->nullable()->native(false),
                    DateTimePicker::make('destination_date_time')->nullable()->native(false),
                    Select::make('airline_id')->relationship('airline', 'name')->required()->searchable()->preload(),
                    TextInput::make('pnr')->nullable(),
                    DateTimePicker::make('pnr_expire')->nullable()->native(false),
                    DateTimePicker::make('fare_expire')->nullable()->native(false),
                    TextInput::make('airline_locator')->nullable(),
                ])->columns(3),

                Section::make('Additional Details')->schema([
                    Select::make('quick_type')->options([
                        'not_under_quoted' => 'Not Under Quoted',
                        'under_quoted_with_availability' => 'Under Quoted (With Availability)',
                        'under_quoted_with_no_availability' => 'Under Quoted (No Availability)',
                    ])->nullable(),
                    Select::make('payment_plan')->options(['full' => 'Full', 'installments' => 'Installments'])->default('full')->nullable(),
                    RichEditor::make('flight_detail_system')->nullable(),
                    RichEditor::make('flight_detail_client')->nullable(),
                ])->columns(2),

                Section::make('Financial Details')->schema([
                    TextInput::make('basic_fare')->numeric()->required()->default(0),
                    TextInput::make('tax')->numeric()->required()->default(0),
                    TextInput::make('apc')->numeric()->required()->default(0),
                    TextInput::make('safi')->numeric()->required()->default(0),
                    TextInput::make('misc')->numeric()->required()->default(0),
                ])->columns(5),

                TableRepeater::make('passengers')
                    ->hiddenLabel()
                    ->relationship('passengers') // Establish relationship with the Passenger model
                    ->schema([
                        Select::make('title')
                            ->options([
                                'mr.' => 'Mr.',
                                'ms.' => 'Ms.',
                                'mrs.' => 'Mrs.',
                            ])
                            ->default('mr.')
                            ->extraInputAttributes(['style' => 'padding-top: 0.275rem; padding-bottom: 0.275rem;'])
                            ->required(),


                        TextInput::make('first_name')->required()->maxLength(255),
                        TextInput::make('middle_name')->maxLength(255),
                        TextInput::make('last_name')->required()->maxLength(255),

                        Select::make('relation')
                            ->options([
                                'child' => 'Child',
                                'infant' => 'Infant',
                                'adult' => 'Adult',
                            ])
                            ->default('adult')
                            ->extraInputAttributes(['style' => 'padding-top: 0.275rem; padding-bottom: 0.275rem;'])
                            ->required(),

                        TextInput::make('sale')->numeric()->default(0),
                        TextInput::make('admin_fee')->numeric()->default(0),

                        TextInput::make('ticket_no')->maxLength(255),
                    ])
                    ->columns(8)
                    ->minItems(1) // Require at least one passenger
                    ->collapsible() // Allows collapsing each entry
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('booking_date')->sortable(),
                TextColumn::make('booking_agent')->sortable(),
                TextColumn::make('supplier.name')->label('Supplier')->sortable(),
                TextColumn::make('payment_method')->sortable(),
                TextColumn::make('payment_amount')->sortable()->money('USD'),
                TextColumn::make('customer_name')->sortable()->columnSpanFull(),
                TextColumn::make('departureAirport.city')
                    ->label('Departure Airport')
                    ->formatStateUsing(fn($record) => "{$record->departureAirport->city} ({$record->departureAirport->code})")
                    ->searchable(),

                TextColumn::make('destinationAirport.city')
                    ->label('Destination Airport')
                    ->formatStateUsing(fn($record) => "{$record->destinationAirport->city} ({$record->destinationAirport->code})")
                    ->searchable(),

                TextColumn::make('airline.name')->label('Airline')->sortable(),
                BooleanColumn::make('going_stopover')->label('Stopover (Going)'),
                BooleanColumn::make('return_stopover')->label('Stopover (Return)'),
                TextColumn::make('departure_date_time')->dateTime()->sortable(),
                TextColumn::make('destination_date_time')->dateTime()->sortable(),
                TextColumn::make('flight_class')->badge()->formatStateUsing(fn($state) => match ($state) {
                    'economy' => 'Economy',
                    'business' => 'Business',
                    'first_class' => 'First Class',
                    default => $state,

                })
                    ->colors([
                        'economy' => 'green',
                        'business' => 'blue',
                        'first_class' => 'red',
                    ]),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}