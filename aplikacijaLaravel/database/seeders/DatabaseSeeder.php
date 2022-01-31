<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Auto;
use App\Models\User;
use App\Models\Kategorija;
use App\Models\Proizvodjac;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        Auto::truncate();
        User::truncate();
        Proizvodjac::truncate();
        Kategorija::truncate();

        $this->call([
            KategorijaSeeder::class
        ]);

        Auto::factory(10)->create();

        
    }
}
