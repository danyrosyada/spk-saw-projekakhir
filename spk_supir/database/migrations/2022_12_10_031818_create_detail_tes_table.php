<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_tes', function (Blueprint $table) {
            $table->integer('id_detail_tes')->autoIncrement();
            $table->unsignedBigInteger('id_tes');
            $table->unsignedBigInteger('id_pertanyaan');
            $table->unsignedBigInteger('id_jawaban');
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
        Schema::dropIfExists('detail_tes');
    }
}
