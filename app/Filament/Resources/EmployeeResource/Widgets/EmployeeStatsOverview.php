<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $ug =Country::where('country_code','UG')->withCount('employees')->first();
        $ke =Country::where('country_code','KE')->withCount('employees')->first();
        $drc =Country::where('country_code','DRC')->withCount('employees')->first();
        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make($ug->name.' '. 'Employees', $ug->employees_count),
            Card::make($ke->name.' '. 'Employees', $ke->employees_count),
            Card::make($drc->name.' '. 'Employees', $drc->employees_count),
        ];
    }
}