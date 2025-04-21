<?php

namespace App\Filament\Resources\KategoriBukuResource\Pages;

use App\Filament\Resources\KategoriBukuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriBukus extends ListRecords
{
    protected static string $resource = KategoriBukuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
