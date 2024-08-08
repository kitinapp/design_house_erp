<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\CreateRecordAndRedirectToIndex;
use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecordAndRedirectToIndex
{

    protected static string $resource = CustomerResource::class;

}
