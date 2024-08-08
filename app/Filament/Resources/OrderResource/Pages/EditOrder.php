<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\EditRecordAndRedirectToIndex;
use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditOrder extends EditRecordAndRedirectToIndex
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Order Updated.')
            ->body('The Order Updated Successfully');
    }
}
