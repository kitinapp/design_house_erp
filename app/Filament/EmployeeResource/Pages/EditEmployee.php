<?php

namespace App\Filament\EmployeeResource\Pages;

use App\Filament\EditRecordAndRedirectToIndex;
use App\Filament\EmployeeResource\EmployeeResource;
use Filament\Actions;

class EditEmployee extends EditRecordAndRedirectToIndex
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
