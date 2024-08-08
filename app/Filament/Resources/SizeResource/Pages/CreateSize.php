<?php

namespace App\Filament\Resources\SizeResource\Pages;

use App\Filament\CreateRecordAndRedirectToIndex;
use App\Filament\Resources\SizeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSize extends CreateRecordAndRedirectToIndex
{
    protected static string $resource = SizeResource::class;
}
