<?php

namespace App\Filament\Resources\EquipoResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JugadorasRelationManager extends RelationManager
{
    protected static string $relationship = 'jugadoras';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre'),
                Forms\Components\TextInput::make('apellidos'),
                Forms\Components\TextInput::make('posicion'),
                Forms\Components\TextInput::make('telefono'),
                Forms\Components\DatePicker::make('fecha_nacimiento'),
                Forms\Components\Textarea::make('comentarios')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('jugadoras')
            ->columns([
                Tables\Columns\TextColumn::make('nombre'),
                Tables\Columns\TextColumn::make('apellidos')->searchable(),
                Tables\Columns\TextColumn::make('posicion')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('fecha_nacimiento')->label('Fecha de nacimiento'),
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
