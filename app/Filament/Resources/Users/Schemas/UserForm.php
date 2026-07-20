<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        // upload foto
                        FileUpload::make('photo_path')
                            ->label('Upload foto profil')
                            ->hiddenLabel()
                            ->image()   // khusus upload gambar
                            ->avatar()  // resize otomatis dan circular
                            ->disk('public')    // partisi storage
                            ->directory('user-photos')  // nama folder
                            ->maxSize(1024) // ukuran max 1MB
                            ->imageEditor()
                            ->columnSpanFull()
                            ->alignCenter(),
                        TextInput::make('name')
                            ->label('Nama lengkap')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('email')
                            ->label('Alamat Email')
                            ->unique('users', 'email')
                            ->prefix('@')
                            ->email(),
                        TextInput::make('username')
                            ->label('Login Username')
                            ->required()
                            ->unique(
                                table: 'users',
                                column: 'username',
                            ),
                        TextInput::make('phone')
                            ->label('Phone')
                            ->prefixIcon(Heroicon::OutlinedPhone)
                            ->tel(),
                        Toggle::make('is_staff')
                            ->required()
                            ->default(true),

                        TextInput::make('password')
                            ->hiddenOn('edit')
                            ->revealable()
                            ->password()
                            ->required(),
                    ]),
            ]);
    }
}
