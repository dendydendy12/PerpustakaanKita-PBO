<?php

namespace App\Filament\Resources\KoleksiPribadiResource\Pages;

use App\Filament\Resources\KoleksiPribadiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKoleksiPribadis extends ListRecords
{
    protected static string $resource = KoleksiPribadiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
