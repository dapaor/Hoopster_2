<?php

namespace App\Filament\Resources\JugadoraResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TemporadaRelationManager extends RelationManager
{
    protected static string $relationship = 'temporadas';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('temporada')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('equipo_id')
                    ->relationship('equipo', 'nombre')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nombre'),
                        Forms\Components\TextInput::make('ciudad')->label('Localidad')

                    ]),
                Forms\Components\TextInput::make('salario')
                    ->label('Salario')
                    ->numeric()
                    ->prefix('€')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('temporada')
            ->columns([
                Tables\Columns\TextColumn::make('temporada')->sortable(),
                Tables\Columns\TextColumn::make('equipo.nombre'),
                Tables\Columns\TextColumn::make('salario')
                    ->money('eur')
                    ->sortable()
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
