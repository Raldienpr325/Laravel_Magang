<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Checkout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Checkout', function (Blueprint $table) {
            $table->id();
            $table->string('nama_user');
            $table->string('nama_barang');
            $table->integer('waktu');
            $table->integer('jumlah');
            $table->string('alamat');
            $table->integer('biaya_layanan');
            $table->integer('biaya_PPN');
            $table->integer('biaya_operasional');
            $table->integer('biaya_pembuatan');
            $table->integer('biaya_total');
            $table->rememberToken();
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
        //
    }
}
