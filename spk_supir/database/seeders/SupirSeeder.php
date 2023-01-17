<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
 
class SupirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $faker = Faker::create('id_ID');
        $nama[1] = "Arif";
        $nama[2] = "Bagus";
        $nama[3] = "Daryo";
        $nama[4] = "Suwito";
        $nama[5] = "Tahril";
        for ($i = 1; $i < 6; $i++) {
            DB::table('supir')->insert([
                'nama' => $nama[$i],
                'lahir' => $faker->city,
                'tgl_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'alamat' => $faker->address,
                'hp' => $faker->phoneNumber,
            ]);
        }
    }
}
