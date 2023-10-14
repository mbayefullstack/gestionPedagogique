<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'prenom' => 'Ibrahima',
                'nom' => 'Diao',
                'tel' => '78 187 46 88',
                'adresse' => 'Almadies Dakar',
                'type' => 'ETUDIANT',
                'email' => 'diao@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'prenom' => 'Aissatou',
                'nom' => 'Diao',
                'tel' => '76 956 00 96',
                'adresse' => 'Kandianlang Ziguinchor',
                'type' => 'ETUDIANT',
                'email' => 'diaoaicha@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'prenom' => 'Sira',
                'nom' => 'Diallo',
                'tel' => '77 956 00 96',
                'adresse' => 'Ouakam Dakar',
                'type' => 'ETUDIANT',
                'email' => 'diallo@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'prenom' => 'Birane',
                'nom' => 'Wane',
                'tel' => '78 956 00 96',
                'adresse' => 'Dakar',
                'type' => 'PROFESSEUR',
                'email' => 'wane@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'prenom' => 'Coach',
                'nom' => 'Aly',
                'tel' => '70 956 00 96',
                'adresse' => 'Dakar',
                'type' => 'PROFESSEUR',
                'email' => 'aly@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'prenom' => 'Ibrahima',
                'nom' => 'Diao',
                'tel' => '76 337 52 78',
                'adresse' => 'Kandianlang Ziguinchor',
                'type' => 'PROFESSEUR',
                'email' => 'diao2@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'prenom' => 'Andrien',
                'nom' => 'Basse',
                'tel' => '77 187 46 88',
                'adresse' => 'Dakar',
                'type' => 'PROFESSEUR',
                'email' => 'Basse@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'prenom' => 'Yancouba',
                'nom' => 'Mane',
                'tel' => '75 956 00 96',
                'adresse' => 'Dakar Ziguinchor',
                'type' => 'ATTACHE',
                'email' => 'mane@gmail.com',
                'password' => Hash::make('123'),
            ]
            ,
            [
                'prenom' => 'Elhadj',
                'nom' => 'Odc',
                'tel' => '75 187 46 88',
                'adresse' => 'Dakar',
                'type' => 'RP',
                'email' => 'elhadj@gmail.com',
                'password' => Hash::make('123'),
            ]
        ]);
    }
}
            