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
            'id_kriteria' => '1',
            'soal' => 'Teknik Parkir',
        ]);
        DB::table('pertanyaan')->insert([
            'id_kriteria' => '1',
            'soal' => 'Teknik Tanjakan',
        ]);
        DB::table('pertanyaan')->insert([
            'id_kriteria' => '1',
            'soal' => 'Teknik Pengereman',
        ]);
        DB::table('pertanyaan')->insert([
            'id_kriteria' => '1',
            'soal' => 'Patuh Rambu Lalu Lintas',
        ]);
        DB::table('pertanyaan')->insert([
            'id_kriteria' => '1',
            'soal' => 'Keamanan Dalam Mengemudi',
        ]);
    
        DB::table('pertanyaan')->insert([
            'id_kriteria' => '2',
            'soal' => 'Wawancara Kesehatan',
        ]);
        DB::table('pertanyaan')->insert([
            'id_kriteria' => '2',
            'soal' => 'Trayek Pengiriman Barang',
        ]);
        DB::table('pertanyaan')->insert([
            'id_kriteria' => '2',
            'soal' => 'Kedisiplinan',
        ]);
        DB::table('pertanyaan')->insert([
            'id_kriteria' => '2',
            'soal' => 'Komunikasi',
        ]);
        DB::table('pertanyaan')->insert([
            'id_kriteria' => '2',
            'soal' => 'Kejujuran',
        ]);
    }
}
