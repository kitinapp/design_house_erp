<?php

namespace App\Filament\Resources\StockItemResource\Pages;

use App\Filament\CreateRecordAndRedirectToIndex;
use App\Filament\Resources\StockItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStockItem extends CreateRecordAndRedirectToIndex
{
    protected static string $resource = StockItemResource::class;
}
