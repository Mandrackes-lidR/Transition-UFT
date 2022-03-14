<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    private array $institutions = [
        'Université Toulouse 1 - Capitole',
        'Université Toulouse - Jean Jaurès',
        'Université Toulouse III - Paul Sabatier',
        'INP ENSAT',
        'INP ENSEEIHT',
        'INP ENSIACET',
        'INP ENIT',
        'INP ENM',
        'INP PURPAN',
        'INSA',
        'ISAE SUPAERO',
        'ENAC',
        'IMT Mines Albi - Carmaux',
        'ENVT',
        'UC - Institut National Universitaire Champollion',
        'Sciences Po Toulouse',
        'CREPS',
        'ICAM',
        'ISADT',
        'TBS',
        'CNRS',
        'INRAE',
        'INSERM',
        'IRD',
        'ONERA',
        'CNES',
        'METEO FRANCE',
        'CHU Toulouse',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        if (Institution::count() !== 0) {
            return;
        }
        foreach ($this->institutions as $name) {
            Institution::create(['name' => $name]);
        }
    }
}
