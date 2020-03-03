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
        $this->call(EntitySeeder::class);
        $this->call(typeProyectSeeder::class);
        $this->call(StatusSeeder::class);
    }
}
