<?php

namespace App\Filament\Resources\NurseryResource\Pages;

use App\Filament\Resources\NurseryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNurseries extends ListRecords
{
    protected static string $resource = NurseryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
