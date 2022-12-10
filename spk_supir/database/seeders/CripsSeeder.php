<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CripsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('crips')->insert([
            'kriteria_id'=> '3',
            'nama_crips'=> '<= 1 Tahun',
            'bobot'=> 1,
        ]);
        DB::table('crips')->insert([
            'kriteria_id'=> '3',
            'nama_crips'=> '>= 2 Tahun',
            'bobot'=> 2,
        ]);
        DB::table('crips')->insert([
            'kriteria_id'=> '3',
            'nama_crips'=> '>= 5 Tahun',
            'bobot'=> 3,
        ]);
        
        DB::table('crips')->insert([
            'kriteria_id'=> '4',
            'nama_crips'=> 'SIM A',
            'bobot'=> 1,
        ]);
        DB::table('crips')->insert([
            'kriteria_id'=> '4',
            'nama_crips'=> 'SIM B1',
            'bobot'=> 2,
        ]);
        DB::table('crips')->insert([
            'kriteria_id'=> '4',
            'nama_crips'=> 'SIM B2 Umum',
            'bobot'=> 3,
        ]);

        DB::table('crips')->insert([
            'kriteria_id'=> '5',
            'nama_crips'=> 'Luar Daerah',
            'bobot'=> 1,
        ]);
        DB::table('crips')->insert([
            'kriteria_id'=> '5',
            'nama_crips'=> 'Kabupaten Batang',
            'bobot'=> 2,
        ]);
        DB::table('crips')->insert([
            'kriteria_id'=> '5',
            'nama_crips'=> 'Kabupaten Pekalongan',
            'bobot'=> 3,
        ]);
        DB::table('crips')->insert([
            'kriteria_id'=> '5',
            'nama_crips'=> 'Kota Pekalongan',
            'bobot'=> 4,
        ]);
    }
}
