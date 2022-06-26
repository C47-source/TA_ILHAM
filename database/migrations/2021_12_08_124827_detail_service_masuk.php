<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailServiceMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_service_masuk', function (Blueprint $table) {
            $table->id('id_detail')->primary();
            $table->string('id_service',20);
            $table->string('nm_unit');
            $table->text('deskripsi_kerusakan');
            $table->string('kelengkapan_unit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_service_masuk');
    }
}
