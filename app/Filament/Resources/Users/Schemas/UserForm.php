<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DateTimePicker;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
             ->schema([
                Section::make('User Information')
                    ->description('Please fill in the user details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter Username'),

                        TextInput::make('email')
                            ->label('Email')
                            ->required()
                            ->email()
                            ->maxLength(255)
                            ->placeholder('Enter Email Address'),

                        TextInput::make('password')
                            ->password()
                            ->maxLength(255)
                            ->dehydrated(fn ($state) => filled($state))
                            ->dehydrateStateUsing(fn ($state) => bcrypt($state))
                            ->required(fn (string $context): bool => $context === 'create')
                            ->revealable(),

                        DateTimePicker::make('email_verified_at')
                            ->label('Email Verify')
                            ->placeholder('Select Date'),

                        DateTimePicker::make('subscription_expires_at')
                            ->label('Subscription')
                            ->placeholder('Select subs'),

                        TextInput::make('subscription_token')
                            ->label('SINOMU Token')
                            ->required(),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                            ])
                            ->required(),
                        TextInput::make('username_mpp')
                            ->label('Username MPP')
                            ->maxLength(255)
                            ->placeholder('Enter Username MPP'),
                        TextInput::make('password_mpp')
                            ->label('Password MPP')
                            ->maxLength(255)
                            ->placeholder('Enter Password MPP'),
                        TextInput::make('lokasi_mpp')
                            ->label('Lokasi MPP')
                            ->maxLength(255)
                            ->placeholder('Enter Lokasi MPP'),
                        TextInput::make('api_url')
                            ->label('Base URL')
                            ->maxLength(255)
                            ->placeholder('Enter Base URL'),

                        TextInput::make('fonnte')
                            ->label('Fonnte')
                            ->maxLength(255)
                            ->placeholder('Enter Fonnte Token'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
