<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ServiceMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_masuk', function (Blueprint $table) {
            $table->string('id_service',20)->primary();
            $table->string('id_pelanggan',20);
            $table->string('id_teknisi',20)->nullable();
            $table->timestamp('tanggal_masuk');
            $table->string('jenis_layanan',50);
            $table->string('status',20);
            $table->text('catatan_teknisi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_masuk');
    }
}
