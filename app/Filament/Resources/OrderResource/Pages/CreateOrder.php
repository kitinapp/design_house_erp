<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\CreateRecordAndRedirectToIndex;
use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecordAndRedirectToIndex
{
    protected static string $resource = OrderResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Order Created.')
            ->body('The Order Created Successfully');
    }
}
