<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\CreateRecordAndRedirectToIndex;
use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployee extends CreateRecordAndRedirectToIndex
{
    protected static string $resource = EmployeeResource::class;
}
