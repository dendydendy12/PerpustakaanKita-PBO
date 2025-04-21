<?php

namespace App\Filament\Resources\UlasanBukuResource\Pages;

use App\Filament\Resources\UlasanBukuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUlasanBuku extends EditRecord
{
    protected static string $resource = UlasanBukuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
