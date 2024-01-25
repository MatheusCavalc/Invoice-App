<?php

namespace App\Filament\Resources\ClientItemResource\Pages;

use App\Filament\Resources\ClientItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClientItems extends ListRecords
{
    protected static string $resource = ClientItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
