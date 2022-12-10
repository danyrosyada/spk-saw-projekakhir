<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pertanyaan')->insert([
            'kriteria_id' => '1',
            'soal' => 'Teknik Parkir',
            'bobot' => 5,
        ]);
        DB::table('pertanyaan')->insert([
            'kriteria_id' => '1',
            'soal' => 'Teknik Tanjakan',
            'bobot' => 5,
        ]);
        DB::table('pertanyaan')->insert([
            'kriteria_id' => '1',
            'soal' => 'Teknik Pengereman',
            'bobot' => 5,
        ]);
        DB::table('pertanyaan')->insert([
            'kriteria_id' => '1',
            'soal' => 'Patuh Rambu Lalu Lintas',
            'bobot' => 5,
        ]);
        DB::table('pertanyaan')->insert([
            'kriteria_id' => '1',
            'soal' => 'Keamanan Dalam Mengemudi',
            'bobot' => 5,
        ]);
    
        DB::table('pertanyaan')->insert([
            'kriteria_id' => '2',
            'soal' => 'Wawancara Kesehatan',
            'bobot' => 5,
        ]);
        DB::table('pertanyaan')->insert([
            'kriteria_id' => '2',
            'soal' => 'Wawancara Keimanan',
            'bobot' => 5,
        ]);
        DB::table('pertanyaan')->insert([
            'kriteria_id' => '2',
            'soal' => 'Wawancara Pemahaman',
            'bobot' => 5,
        ]);
        DB::table('pertanyaan')->insert([
            'kriteria_id' => '2',
            'soal' => 'Wawancara Keasikan',
            'bobot' => 5,
        ]);
        DB::table('pertanyaan')->insert([
            'kriteria_id' => '2',
            'soal' => 'Wawancara Kenyamanan',
            'bobot' => 5,
        ]);
    }
}
