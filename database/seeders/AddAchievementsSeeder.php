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
        AchievementsModel::firstOrCreate([
            'title' => 'Pierwsze kroki',
        ], [
            'title' => 'Pierwsze kroki',
            'description' => 'Ukończyłeś swoje pierwsze zadanie!',
            'url'=> '/images/Done1.jpg'
        ]);
    
        AchievementsModel::firstOrCreate([
            'title' => 'Dziesięć na dziesięć',
        ], [
            'title' => 'Dziesięć na dziesięć',
            'description' => 'Ukończyłeś dziesięć zadań!',
            'url'=> '/images/Done10.jpg'
        ]);
    
        AchievementsModel::firstOrCreate([
            'title' => 'Weteran',
        ], [
            'title' => 'Weteran',
            'description' => 'Ukończyłeś sto zadań!',
            'url'=> '/images/Done100.jpg'
        ]);
    
        AchievementsModel::firstOrCreate([
            'title' => 'Człowiek-orkiestra',
        ], [
            'title' => 'Człowiek-orkiestra',
            'description' => 'Bądź w trakcie wykonywania 10 zadań na raz',
            'url'=> '/images/orkiestra.jpg'
        ]);
        
        AchievementsModel::firstOrCreate([
            'title' => 'Ręce pełne roboty',
        ], [
            'title' => 'Ręce pełne roboty',
            'description' => 'Miej do zrobienia na raz 20 nowych zadań',
            'url'=> '/images/robota.jpg'
        ]);
        
        AchievementsModel::firstOrCreate([
            'title' => 'Praca, praca',
        ], [
            'title' => 'Praca, praca',
            'description' => 'Zrób 10 zadań do pracy',
            'url'=> '/images/peon.jpg'
        ]);

        AchievementsModel::firstOrCreate([
            'title' => 'Mól książkowy',
        ], [
            'title' => 'Mól książkowy',
            'description' => 'Zrób 10 zadań na studia',
            'url'=> '/images/mol.jpg'
        ]);
        
        AchievementsModel::firstOrCreate([
            'title' => 'Pilny uczeń',
        ], [
            'title' => 'Pilny uczeń',
            'description' => 'Dodaj 5 notatek edukacyjnych',
            'url'=> '/images/edu.jpg'
        ]);
        
        AchievementsModel::firstOrCreate([
            'title' => 'Poradnik sukcesu',
        ], [
            'title' => 'Poradnik sukcesu',
            'description' => 'Dodaj 5 notatek biznesowych',
            'url'=> '/images/biznes.jpg'
        ]);
        
        AchievementsModel::firstOrCreate([
            'title' => 'Samoorganizacja',
        ], [
            'title' => 'Samoorganizacja',
            'description' => 'Dodaj 5 notatek osobistych',
            'url'=> '/images/self.jpg'
        ]);
        
        AchievementsModel::firstOrCreate([
            'title' => 'Innowacja!',
        ], [
            'title' => 'Innowacja!',
            'description' => 'Dodaj 5 nowych projektów',
            'url'=> '/images/project.jpg'
        ]);  
    }
}
