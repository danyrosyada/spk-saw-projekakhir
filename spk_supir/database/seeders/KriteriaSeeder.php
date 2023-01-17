<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kriteria')->insert([
            'nama_kriteria' => 'Tes Keahlian Mengemudi',
            'jenis' => 'Pertanyaan',
            'attribut' => 'Benefit',
            'bobot' => 20,
        ]);
        DB::table('kriteria')->insert([
            'nama_kriteria' => 'Tes Wawancara',
            'jenis' => 'Pertanyaan',
            'attribut' => 'Benefit',
            'bobot' => 25,
        ]);
        DB::table('kriteria')->insert([
            'nama_kriteria' => 'Pengalaman Kerja',
            'jenis' => 'Crips',
            'attribut' => 'Benefit',
            'bobot' => 15,
        ]);
        DB::table('kriteria')->insert([
            'nama_kriteria' => 'SIM',
            'jenis' => 'Crips',
            'attribut' => 'Benefit',
            'bobot' => 15,
        ]);
        DB::table('kriteria')->insert([
            'nama_kriteria' => 'Jarak',
            'jenis' => 'Crips',
            'attribut' => 'Benefit',
            'bobot' => 15,
        ]);
        DB::table('kriteria')->insert([
            'nama_kriteria' => 'Status Menikah',
            'jenis' => 'Crips',
            'attribut' => 'Cost',
            'bobot' => 10,
        ]);
    }
}
