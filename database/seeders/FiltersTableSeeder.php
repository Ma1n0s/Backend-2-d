<?php

use Illuminate\Database\Seeder;
use App\Models\Filter;

class FiltersTableSeeder extends Seeder
{
    public function run()
    {
        Filter::create([
            'category' => 'Ремонт и строительство',
            'filters' => json_encode(['Электрика', 'Сантехника', 'Строительные материалы']),
        ]);
        Filter::create([
            'category' => 'Ремонт и устанвка техники',
            'filters' => json_encode(['Бытовая техника', 'Компьютеры', 'Телефоны']),
        ]);
    }
}

