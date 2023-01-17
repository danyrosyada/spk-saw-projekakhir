<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penilaian', function (Blueprint $table) {
            $table->integer('id_detail_penilaian')->autoIncrement();
            $table->unsignedBigInteger('id_penilaian');
            $table->unsignedBigInteger('id_crips')->nullable();
            $table->unsignedBigInteger('id_tes')->nullable();
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
        Schema::dropIfExists('detail_penilaians');
    }
}
