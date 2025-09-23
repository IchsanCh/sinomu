<?php

namespace App\Filament\Resources\Subscriptions\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DateTimePicker;

class SubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Subscription Information')
                    ->columns(2)
                    ->description('Please Fill in the subscription details')
                    ->schema([
                        TextInput::make('id')
                            ->label('ID')
                            ->required()
                            ->placeholder('Enter Random Invoice ID'),
                        Select::make('user_id')
                            ->label('User')
                            ->relationship(name: 'user', titleAttribute: 'name')
                            ->required()
                            ->searchable()
                            ->placeholder('Select User')
                            ->preload(),
                        Select::make('package_id')
                            ->label('Package')
                            ->relationship(name: 'package', titleAttribute: 'name')
                            ->required()
                            ->searchable()
                            ->placeholder('Select Package')
                            ->preload(),
                        TextInput::make('status')
                            ->label('Status')
                            ->default('pending')
                            ->required(),
                        TextInput::make('total')
                            ->label('Total Amount')
                            ->numeric()
                            ->required(),
                        DateTimePicker::make('start_date')
                            ->label('Start Date')
                            ->default(now())
                            ->required(),
                        DateTimePicker::make('end_date')
                            ->label('End Date')
                            ->default(now()->addDays(30))
                            ->required(),
                        TextInput::make('payment_token')
                            ->label('Payment Token'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
