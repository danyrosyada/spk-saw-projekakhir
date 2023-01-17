<?php

namespace Database\Seeders;

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
        $this->call(AdminUserSeeder::class);
        $this->call(PeriodeSeeder::class);
        $this->call(SupirSeeder::class);
        $this->call(KriteriaSeeder::class);
        $this->call(CripsSeeder::class);
        $this->call(PertanyaanSeeder::class);
        $this->call(JawabanSeeder::class);
     
    }
}
