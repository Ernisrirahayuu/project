<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('karyawan_id')->unsigned();
            $table->integer('gaji_id')->unsigned();
            $table->integer('pinjaman_id')->unsigned();
            $table->timestamps();

            $table->foreign('karyawan_id')->references('id')
            ->on('karyawans')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('gaji_id')->references('id')
            ->on('gajis')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('pinjaman_id')->references('id')
            ->on('pinjamen')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('totals');
    }
}
