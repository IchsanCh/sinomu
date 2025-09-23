<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\RichEditor;

class AnnouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Announcements Information')
                    ->description('Please Fill in the Announcements details')
                    ->schema([
                        TextInput::make('name')
                            ->label('Title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter Package Name'),
                        RichEditor::make('description')
                            ->label('Description')
                            ->placeholder('Enter Package Description')
                            ->required(),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),
            ]);
    }
}
