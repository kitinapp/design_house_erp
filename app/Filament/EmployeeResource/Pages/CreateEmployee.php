<?php

namespace App\Filament\EmployeeResource\Pages;

use App\Filament\CreateRecordAndRedirectToIndex;
use App\Filament\EmployeeResource\EmployeeResource;

class CreateEmployee extends CreateRecordAndRedirectToIndex
{
    protected static string $resource = EmployeeResource::class;
}
