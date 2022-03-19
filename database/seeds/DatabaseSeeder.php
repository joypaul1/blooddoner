<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            AdminsTableSeeder::class,
            SiteInfosTableSeeder::class,
            AboutusTableSeeder::class,
            ColorTableSeeder::class,
            SizeTableSeeder::class,
            DivisionsTableSeeder::class,
            CitiesTableSeeder::class,
            PostCodeTableSeeder::class

        ]);
    }
}
