<?php

namespace App\Filament\Resources\VendorResource\Pages;

use App\Filament\CreateRecordAndRedirectToIndex;
use App\Filament\Resources\VendorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVendor extends CreateRecordAndRedirectToIndex
{
    protected static string $resource = VendorResource::class;
}
