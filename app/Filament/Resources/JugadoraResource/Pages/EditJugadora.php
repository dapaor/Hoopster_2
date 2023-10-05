<?php

namespace App\Filament\Resources\JugadoraResource\Pages;

use App\Filament\Resources\JugadoraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJugadora extends EditRecord
{
    protected static string $resource = JugadoraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
