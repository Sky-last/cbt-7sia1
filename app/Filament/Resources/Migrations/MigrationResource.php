<?php

namespace App\Filament\Resources\Migrations;

use App\Filament\Resources\Migrations\Pages\ManageMigrations;
use App\Models\Migration;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class MigrationResource extends Resource
{
    protected static ?string $model = Migration::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-circle-stack';

    protected static ?string $recordTitleAttribute = 'migration';

    protected static string|UnitEnum|null $navigationGroup = 'Basis data';

    protected static ?string $modelLabel = 'Migrasi';

    protected static ?string $pluralModelLabel = 'Data Migrasi';

    protected static ?string $navigationLabel = 'Migrasi';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('migration')
                    ->label('Nama Migrasi')
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('batch')
                    ->label('Kelompok')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('NO'),
                TextEntry::make('migration')
                    ->label('Nama Migrasi'),
                TextEntry::make('batch')
                    ->label('Kelompok'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('migration')
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('NO')
                    ->sortable(),
                TextColumn::make('migration')
                    ->label('Nama Migrasi')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('batch')
                    ->label('Kelompok')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageMigrations::route('/'),
        ];
    }
}
