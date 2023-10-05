<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LigaResource\Pages;
use App\Filament\Resources\LigaResource\RelationManagers;
use app\Filament\Resources\LigaResource\RelationManagers\EquipoRelationManager;
use App\Models\Liga;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LigaResource extends Resource
{
    protected static ?string $model = Liga::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre'),
                Forms\Components\TextInput::make('pais')->label('País')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->searchable(),
                Tables\Columns\TextColumn::make('pais')->label('País')->searchable(),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            EquipoRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLigas::route('/'),
            'create' => Pages\CreateLiga::route('/create'),
            'edit' => Pages\EditLiga::route('/{record}/edit'),
        ];
    }
}
