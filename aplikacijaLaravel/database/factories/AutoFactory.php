<?php

namespace Database\Factories;

use App\Models\Proizvodjac;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'model'=>$this->faker->word(),
           'motor'=>$this->faker->word(),
           'godinaProizvodnje'=>$this->faker->numberBetween(1950,2022),
           'proizvodjac_id'=>Proizvodjac::factory(),
           'kategorija_id'=>$this->faker->numberBetween(1,4),
           'user_id'=>User::factory()
        ];
    }
}
