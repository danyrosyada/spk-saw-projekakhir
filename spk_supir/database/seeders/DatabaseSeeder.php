<?php

namespace Database\Seeders;

use App\Models\Crips;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

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
        $this->call(KriteriaSeeder::class);
        $this->call(CripsSeeder::class);
        $this->call(PertanyaanSeeder::class);
        $this->call(JawabanSeeder::class);
        // $faker = Faker::create('id_ID');
        // for ($i = 1; $i < 6; $i++) {
        //     DB::table('supir')->insert([
        //         'nama' => $faker->name,
        //         'lahir' => $faker->city,
        //         'tgl_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //         'alamat' => $faker->address,
        //         'hp'=> $faker->phoneNumber,
        //     ]);
        // }
    }
}
