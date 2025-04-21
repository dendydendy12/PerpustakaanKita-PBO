<?php

namespace App\Filament\Resources\UlasanBukuResource\Pages;

use App\Filament\Resources\UlasanBukuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUlasanBukus extends ListRecords
{
    protected static string $resource = UlasanBukuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
