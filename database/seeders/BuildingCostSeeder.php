<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BuildingCost;

class BuildingCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'wall_material' => 'Кирпичные и каменные',
                'floors' => '2 - 3-этажные',
                'repair_cost_under_30' => 1427,
                'repair_cost_over_30' => 2573,
                'modernization_total' => 3313,
                'modernization_thermal' => 891,
            ],
            [
                'wall_material' => 'Кирпичные и каменные',
                'floors' => '4 - 5-этажные',
                'repair_cost_under_30' => 904,
                'repair_cost_over_30' => 1545,
                'modernization_total' => 2168,
                'modernization_thermal' => 604,
            ],
            [
                'wall_material' => 'Кирпичные и каменные',
                'floors' => '6 - 10-этажные',
                'repair_cost_under_30' => 921,
                'repair_cost_over_30' => 1550,
                'modernization_total' => 1792,
                'modernization_thermal' => 648,
            ],
            [
                'wall_material' => 'Кирпичные и каменные',
                'floors' => '12-этажные',
                'repair_cost_under_30' => 752,
                'repair_cost_over_30' => 1326,
                'modernization_total' => 1810,
                'modernization_thermal' => 685,
            ],
            [
                'wall_material' => 'Крупнопанельные и объемно-блочные',
                'floors' => '2 - 3-этажные',
                'repair_cost_under_30' => 1529,
                'repair_cost_over_30' => 2672,
                'modernization_total' => 3216,
                'modernization_thermal' => 732,
            ],
            [
                'wall_material' => 'Крупнопанельные и объемно-блочные',
                'floors' => '4 - 5-этажные',
                'repair_cost_under_30' => 904,
                'repair_cost_over_30' => 1507,
                'modernization_total' => 1709,
                'modernization_thermal' => 802,
            ],
            [
                'wall_material' => 'Крупнопанельные и объемно-блочные',
                'floors' => '6 - 10-этажные',
                'repair_cost_under_30' => 921,
                'repair_cost_over_30' => 1565,
                'modernization_total' => 1488,
                'modernization_thermal' => 697,
            ],
            [
                'wall_material' => 'Крупнопанельные и объемно-блочные',
                'floors' => '12-этажные',
                'repair_cost_under_30' => 776,
                'repair_cost_over_30' => 1391,
                'modernization_total' => 1531,
                'modernization_thermal' => 744,
            ],
        ];

        BuildingCost::insert($data);
    }
}
