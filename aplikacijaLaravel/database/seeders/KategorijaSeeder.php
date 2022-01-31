<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategorija;

class KategorijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kat1=Kategorija::create([
            'naziv' => "putnicko"
        ]);

        $kat2=Kategorija::create([
            'naziv' => "teretno"
        ]);

        $kat3=Kategorija::create([
            'naziv' => "motocikl"
        ]);

        $kat4=Kategorija::create([
            'naziv' => "autobus"
        ]);
    }
}
