<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periode')->insert([
            'judul'=> 'Periode Bulan November',
            'ket'=> 'Membutuhkan 3 Supir',
            'status'=> 1,
        ]);
    }
}
