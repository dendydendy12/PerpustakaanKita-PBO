<?php

namespace App\Filament\Resources\KoleksiPribadiResource\Pages;

use App\Filament\Resources\KoleksiPribadiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKoleksiPribadi extends EditRecord
{
    protected static string $resource = KoleksiPribadiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
