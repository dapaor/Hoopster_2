<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JugadoraResource\Pages;
use App\Filament\Resources\JugadoraResource\RelationManagers;
use App\Models\Equipo;
use App\Models\Jugadora;
use Faker\Provider\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Laravel\Sanctum\Http\Middleware\CheckAbilities;
use function Laravel\Prompts\search;

class JugadoraResource extends Resource
{
    protected static ?string $model = Jugadora::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre'),
                Forms\Components\TextInput::make('apellidos'),
                Forms\Components\TextInput::make('posicion'),
                Forms\Components\TextInput::make('telefono'),
                Forms\Components\DatePicker::make('fecha_nacimiento'),
                Forms\Components\Select::make('equipo_id')
                ->relationship('equipo', 'nombre')
                ->searchable()
                ->preload()
                ->createOptionForm([
                    Forms\Components\TextInput::make('nombre'),
                    Forms\Components\TextInput::make('ciudad')->label('Localidad')
                ]),
                Forms\Components\Checkbox::make('interesante')->label('Interesante'),
                Forms\Components\Checkbox::make('junior')->label('Junior'),
                Forms\Components\Textarea::make('comentarios'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre'),
                Tables\Columns\TextColumn::make('apellidos')->searchable(),
                Tables\Columns\TextColumn::make('posicion')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('fecha_nacimiento')->label('Fecha de nacimiento'),
                Tables\Columns\TextColumn::make('equipo.nombre')
                    ->label('Equipo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\CheckboxColumn::make('interesante')->label('Interesante')->sortable(),
                Tables\Columns\CheckboxColumn::make('junior')->label('Ficha Junior')->sortable()
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('equipo_id')
                    ->multiple()
                    ->relationship('equipo', 'nombre')
                    ->label('Club'),
                Tables\Filters\SelectFilter::make('interesante')
                    ->label('Interesante')
                    ->options([
                        true => 'Sí',
                        false => 'No'
                    ]),
                Tables\Filters\SelectFilter::make('junior')
                    ->label('Ficha Junior')
                    ->options([
                        true => 'Sí',
                        false => 'No'
                    ])
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
            //
            RelationManagers\TemporadaRelationManager::make(),
            RelationManagers\EstadisticasRelationManager::make()
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJugadoras::route('/'),
            'create' => Pages\CreateJugadora::route('/create'),
            'edit' => Pages\EditJugadora::route('/{record}/edit'),
        ];
    }
}
