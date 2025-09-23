<?php

namespace App\Filament\Resources\Packages\Schemas;

use Dom\Text;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
             ->schema([
                Section::make('Package Information')
                    ->columns(2)
                    ->description('Please Fill in the package details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Package Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter Package Name'),
                        TextInput::make('description')
                            ->label('Description')
                            ->maxLength(500)
                            ->placeholder('Enter Package Description'),
                        TextInput::make('price')
                            ->label('Price')
                            ->numeric()
                            ->required()
                            ->placeholder('Enter Package Price'),
                        TextInput::make('duration_days')
                            ->label('Duration (in days)')
                            ->numeric()
                            ->required()
                            ->placeholder('Enter Duration in Days'),
                        Select::make('visible')
                        ->options([
                            'public' => 'Public',
                            'private' => 'Private',
                        ])
                        ->native(false),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
