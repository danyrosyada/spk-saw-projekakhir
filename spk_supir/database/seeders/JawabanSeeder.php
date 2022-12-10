<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '1',
            'pg' => 'A',
            'jawaban' => 'Bagus',
            'bobot' => 5,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '1',
            'pg' => 'C',
            'jawaban' => 'Lumayan',
            'bobot' => 3,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '1',
            'pg' => 'C',
            'jawaban' => 'Kurang',
            'bobot' => 1,
        ]);

        DB::table('jawaban')->insert([
            'pertanyaan_id' => '2',
            'pg' => 'A',
            'jawaban' => 'Bagus',
            'bobot' => 5,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '2',
            'pg' => 'C',
            'jawaban' => 'Lumayan',
            'bobot' => 3,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '2',
            'pg' => 'C',
            'jawaban' => 'Kurang',
            'bobot' => 1,
        ]);

        DB::table('jawaban')->insert([
            'pertanyaan_id' => '3',
            'pg' => 'A',
            'jawaban' => 'Bagus',
            'bobot' => 5,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '3',
            'pg' => 'C',
            'jawaban' => 'Lumayan',
            'bobot' => 3,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '3',
            'pg' => 'C',
            'jawaban' => 'Kurang',
            'bobot' => 1,
        ]);

        DB::table('jawaban')->insert([
            'pertanyaan_id' => '4',
            'pg' => 'A',
            'jawaban' => 'Bagus',
            'bobot' => 5,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '4',
            'pg' => 'C',
            'jawaban' => 'Lumayan',
            'bobot' => 3,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '4',
            'pg' => 'C',
            'jawaban' => 'Kurang',
            'bobot' => 1,
        ]);

        DB::table('jawaban')->insert([
            'pertanyaan_id' => '5',
            'pg' => 'A',
            'jawaban' => 'Bagus',
            'bobot' => 5,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '5',
            'pg' => 'C',
            'jawaban' => 'Lumayan',
            'bobot' => 3,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '5',
            'pg' => 'C',
            'jawaban' => 'Kurang',
            'bobot' => 1,
        ]);

        


        DB::table('jawaban')->insert([
            'pertanyaan_id' => '6',
            'pg' => 'A',
            'jawaban' => 'Bagus',
            'bobot' => 5,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '6',
            'pg' => 'C',
            'jawaban' => 'Lumayan',
            'bobot' => 3,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '6',
            'pg' => 'C',
            'jawaban' => 'Kurang',
            'bobot' => 1,
        ]);

        DB::table('jawaban')->insert([
            'pertanyaan_id' => '7',
            'pg' => 'A',
            'jawaban' => 'Bagus',
            'bobot' => 5,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '7',
            'pg' => 'C',
            'jawaban' => 'Lumayan',
            'bobot' => 3,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '7',
            'pg' => 'C',
            'jawaban' => 'Kurang',
            'bobot' => 1,
        ]);

        DB::table('jawaban')->insert([
            'pertanyaan_id' => '8',
            'pg' => 'A',
            'jawaban' => 'Bagus',
            'bobot' => 5,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '8',
            'pg' => 'C',
            'jawaban' => 'Lumayan',
            'bobot' => 3,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '8',
            'pg' => 'C',
            'jawaban' => 'Kurang',
            'bobot' => 1,
        ]);

        DB::table('jawaban')->insert([
            'pertanyaan_id' => '9',
            'pg' => 'A',
            'jawaban' => 'Bagus',
            'bobot' => 5,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '9',
            'pg' => 'C',
            'jawaban' => 'Lumayan',
            'bobot' => 3,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '9',
            'pg' => 'C',
            'jawaban' => 'Kurang',
            'bobot' => 1,
        ]);

        DB::table('jawaban')->insert([
            'pertanyaan_id' => '10',
            'pg' => 'A',
            'jawaban' => 'Bagus',
            'bobot' => 5,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '10',
            'pg' => 'C',
            'jawaban' => 'Lumayan',
            'bobot' => 3,
        ]);
        DB::table('jawaban')->insert([
            'pertanyaan_id' => '10',
            'pg' => 'C',
            'jawaban' => 'Kurang',
            'bobot' => 1,
        ]);
    }
}
