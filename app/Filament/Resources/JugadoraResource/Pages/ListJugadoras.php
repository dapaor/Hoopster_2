<?php

namespace App\Filament\Resources\JugadoraResource\Pages;

use App\Filament\Resources\JugadoraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJugadoras extends ListRecords
{
    protected static string $resource = JugadoraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
