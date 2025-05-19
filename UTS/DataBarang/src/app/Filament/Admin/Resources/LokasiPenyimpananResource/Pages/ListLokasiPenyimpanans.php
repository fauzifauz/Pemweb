<?php

namespace App\Filament\Admin\Resources\LokasiPenyimpananResource\Pages;

use App\Filament\Admin\Resources\LokasiPenyimpananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLokasiPenyimpanans extends ListRecords
{
    protected static string $resource = LokasiPenyimpananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
