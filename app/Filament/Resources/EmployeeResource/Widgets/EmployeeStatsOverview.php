<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $it = Country::where('country_code', 'IT')->withCount('employees')->first();

        return [
            Card::make('All Employes', Employee::all()->count())
                ->description('Tutti gli impiegati inseriti')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Impiegati ITA:', $it ? $it->employees_count : 0),
            Card::make('Valore statico a caso', '3:12'),
        ];
    }
}
