<?php

namespace App\Filament\Resources\StockItemResource\Pages;

use App\Filament\EditRecordAndRedirectToIndex;
use App\Filament\Resources\StockItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStockItem extends EditRecordAndRedirectToIndex
{
    protected static string $resource = StockItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
