<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->integer('id_kriteria')->autoIncrement();
            $table->string('nama_kriteria', 200)->unique();
            $table->enum('jenis', ['Crips', 'Pertanyaan'])->default('Crips');
            $table->enum('attribut', ['Benefit', 'Cost'])->default('Benefit');
            $table->integer('bobot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria');
    }
}
