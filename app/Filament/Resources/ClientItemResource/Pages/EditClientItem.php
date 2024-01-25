<?php

namespace App\Filament\Resources\ClientItemResource\Pages;

use App\Filament\Resources\ClientItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClientItem extends EditRecord
{
    protected static string $resource = ClientItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
