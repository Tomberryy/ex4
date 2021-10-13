<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;
use App\Models\Weapon;
use App\Models\Ability;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Ability::factory()->count(10)->create();
        $ids = range(1, 10);

        $heroes = Hero::factory()->count(30)->create()->each(function ($hero) use ($ids) {
            shuffle($ids);
            $hero->abilities()->attach(array_slice($ids, 0, rand(1,4)));
        });

        Weapon::factory()->count(10)->create()->each(function($weapon) use ($heroes) {
            $weapon->hero_id=$heroes->random()->id;
            $weapon->save();
        });
    }
}
