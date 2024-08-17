<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Metrics\DonutChartMetric; 
use App\Models\Player;
use App\Models\Team;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Grid;
use MoonShine\Metrics\ValueMetric;

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Dashboard';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
        $totalPlayers = Player::count();
        $totalTeams = Team::count();
		return [
            Grid::make([
                ValueMetric::make('Cantidad de jugadores')->value($totalPlayers)->icon('heroicons.user')->columnSpan(3),
                ValueMetric::make('Total de Equipos')->value($totalTeams)->icon('heroicons.user-group')->columnSpan(3),
                ValueMetric::make('Cantidad de jugadores')->value($totalPlayers)->icon('heroicons.user')->columnSpan(3),
                ValueMetric::make('Total de Equipos')->value($totalTeams)->icon('heroicons.user-group')->columnSpan(3),
            ]),
            DonutChartMetric::make('Subscribers') 
            ->values(['CutCode' => 10000, 'Apple' => 9999]) 

        ];
	}
}
