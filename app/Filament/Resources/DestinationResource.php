<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DestinationResource\Pages;
use App\Filament\Resources\DestinationResource\RelationManagers;
use App\Models\Destination;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Z3d0X\FilamentFabricator\Models\Page;

class DestinationResource extends Resource
{
    protected static ?string $model = Destination::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('country')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('continent')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name') // Assuming users have a "name" column
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('city')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('country')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('continent')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('user.name')->label('Added By')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('continent')
                    ->options([
                        'Africa' => 'Africa',
                        'Europe' => 'Europe',
                        'Asia' => 'Asia',
                        'North America' => 'North America',
                        'South America' => 'South America',
                        'Australia' => 'Australia',
                        'Antarctica' => 'Antarctica',
                    ])
                    ->label('Filter by Continent'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\Action::make('add Page')
                    ->color('success')
                    ->icon('heroicon-o-document-plus')
                    ->visible(fn($record) => !Page::where('destination_id', $record->id)->exists()) // Show only if no page exists
                    ->requiresConfirmation()
                    ->action(fn($record) => self::createPage($record)),



                Tables\Actions\Action::make('Edit Page')
                    ->visible(fn($record) => Page::where('destination_id', $record->id)->exists()) // Show only if a page exists
                    ->url(fn($record) => route('filament.admin.resources.pages.edit', ['record' => Page::where('destination_id', $record->id)->first()->id]))
                    ->icon('heroicon-o-pencil'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('Create Pages')
                        ->color('success')
                        ->icon('heroicon-o-document-plus')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            $createdCount = 0;
                            foreach ($records as $record) {
                                if (!Page::where('destination_id', $record->id)->exists()) {
                                    self::createPage($record);
                                    $createdCount++;
                                }
                            }

                            if ($createdCount > 0) {
                                Notification::make()
                                    ->title("{$createdCount} pages created successfully!")
                                    ->success()
                                    ->send();
                            } else {
                                Notification::make()
                                    ->title("No pages were created.")
                                    ->danger()
                                    ->body("All selected destinations already have pages.")
                                    ->send();
                            }
                        }),
                ]),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    protected static function createPage($record)
    {
        $slug = 'cheap-flights-to-' . Str::slug($record->city);

        Page::create([
            'title' => $record->city,
            'slug' => $slug,
            'layout' => 'default',
            'blocks' => [
                [
                    "type" => "hero2",
                    "data" => [
                        "title" => "cheap flights to {$record->city}",
                        "backgrounds" => [
                            ["image" => "hero-bg/01JMMW5Y52G07P739A9RQ3VSQP.webp"]
                        ]
                    ]
                ],
                [
                    "type" => "destination-details",
                    "data" => [
                        "backgrounds" => [
                            ["image" => "featured-images/01JMCSN1SS17C8BMJ01H9X0QG9.webp"],
                            ["image" => "featured-images/01JMCSN2A3MSXCQ4MG8SERQ1QC.webp"],
                            ["image" => "featured-images/01JMCSN2FEHTHD505WPTTE0CEW.webp"],
                            ["image" => "featured-images/01JMCSN2NW4NNBYGWEZ948T2D4.webp"]
                        ],
                        "Title" => "cheap flights to {$record->city} on Explore Flights"
                    ]
                ],
                [
                    "type" => "meta",
                    "data" => [
                        "keywords" => ["Book Flights"],
                        "title" => "Cheap flights to {$record->city}",
                        "description" => "Find Cheapest flights to {$record->city}",
                        "og_title" => "Cheap Flights to {$record->city}",
                        "og_image" => null,
                        "og_description" => "Find Cheapest flights to {$record->city}"
                    ]
                ],
                [
                    "type" => "f-a-q",
                    "data" => [
                        "cover" => "faq-covers/01JKX7XFXKPJE6JW8JRTG5S8C7.webp",
                        "faqs" => [
                            [
                                "question" => "Why should I choose Explore Flights?",
                                "answer" => "<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry...</p><blockquote>This is a quote</blockquote>"
                            ],
                            [
                                "question" => "What is there to see in {$record->city}?",
                                "answer" => "<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry.</p>"
                            ]
                        ]
                    ]
                ]
            ],
            'parent_id' => null,
            'destination_id' => $record->id,
            'index' => 0,
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDestinations::route('/'),
            // 'create' => Pages\CreateDestination::route('/create'),
            // 'edit' => Pages\EditDestination::route('/{record}/edit'),
        ];
    }
}