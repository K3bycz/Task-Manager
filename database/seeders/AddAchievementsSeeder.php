<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\AchievementsModel;

class AddAchievementsSeeder extends Seeder
{
    public function run()
    {
        AchievementsModel::create([
            'title' => 'Pierwsze kroki',
            'description' => 'Ukończyłeś swoje pierwsze zadanie!',
            'url'=> '/images/Done1.jpg'
        ]);

        AchievementsModel::create([
            'title' => 'Dziesięć na dziesięć',
            'description' => 'Ukończyłeś dziesięć zadań!',
            'url'=> '/images/Done10.jpg'
        ]);

        AchievementsModel::create([
            'title' => 'Weteran',
            'description' => 'Ukończyłeś sto zadań!',
            'url'=> '/images/Done100.jpg'
        ]);

        AchievementsModel::create([
            'title' => 'Człowiek-orkiestra',
            'description' => 'Bądź w trakcie wykonywania 10 zadań na raz',
            'url'=> '/images/orkiestra.jpg'
        
        ]);   
    }
}
