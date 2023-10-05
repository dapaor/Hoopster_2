<?php

namespace App\Filament\Resources\JugadoraResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class EstadisticasRelationManager extends RelationManager
{
    protected static string $relationship = 'estadisticas';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('temporada')
                    ->label('Temporada')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('puntos_anotados')
                    ->label('Puntos anotados')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('partidos_jugados')
                    ->label('Partidos jugados')
                    ->numeric()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('faltas_cometidas')
                    ->label('Faltas cometidas')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('tiros_libres')
                    ->label('Tiros libres')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('puntos_anotados')
            ->columns([
                Tables\Columns\TextColumn::make('temporada'),
                Tables\Columns\TextColumn::make('puntos_anotados'),
                Tables\Columns\TextColumn::make('tiros_libres'),
                Tables\Columns\TextColumn::make('faltas_cometidas'),
                Tables\Columns\TextColumn::make('partidos_jugados'),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
