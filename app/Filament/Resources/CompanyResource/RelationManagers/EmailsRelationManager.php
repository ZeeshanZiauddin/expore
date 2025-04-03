<?php

namespace App\Filament\Resources\CompanyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmailsRelationManager extends RelationManager
{
    protected static string $relationship = 'Emails';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required(),

                Select::make('user_id')
                    ->label('Select User')
                    ->relationship('user', 'name')
                    ->required()
                    ->preload()
                    ->searchable(),
                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->required()
                    ->unique('company_emails', 'email')->afterStateUpdated(function ($state, callable $set) {
                        $set('mail_username', $state);
                    })->debounce(1000),

                Select::make('mail_host')
                    ->options([
                        'smtp.hostinger.com' => 'Hostinger',
                        'smtp.mailgun.com' => 'Mailgun',
                        'smtpout.secureserver.net' => 'Godaddy',

                    ])
                    ->label('SMTP Host')
                    ->required(),

                Select::make('mail_port')
                    ->options(
                        [
                            '587' => '587',
                            '465' => '465',
                            '25' => '25',
                        ]
                    )->label('SMTP Port')
                    ->required(),

                TextInput::make('mail_username')
                    ->label('SMTP Username')
                    ->required(),

                TextInput::make('mail_password')
                    ->label('SMTP Password')
                    ->password()
                    ->required(),

                Select::make('mail_encryption')
                    ->label('Encryption')
                    ->options([
                        'tls' => 'TLS',
                        'ssl' => 'SSL',
                    ])
                    ->default('ssl')
                    ->required(),
                TextInput::make('mail_from_name')
                    ->label('From Name')
                    ->required(),

                TextInput::make('mail_from_address')
                    ->label('From Email')
                    ->email()
                    ->required(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('mail_host')
                    ->label('SMTP Host'),


                TextColumn::make('mail_username')
                    ->label('Username'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}