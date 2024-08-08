<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\StockItem;
use App\Models\Team;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Orders', Order::query()->count())
                ->description('All Orders')
                ->descriptionIcon('fas-shopping-cart')
                ->color('success'),
            Stat::make('Customers', Customer::query()->count())
                ->description('All Customers')
                ->descriptionIcon('fas-users-gear')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('warning'),
            Stat::make('Stock Items', StockItem::query()->count())
                ->description('All Stock Items')
                ->descriptionIcon('fas-box')
                ->color('success'),
        ];
    }
}
