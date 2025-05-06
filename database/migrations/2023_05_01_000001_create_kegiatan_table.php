<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kegiatan', function (Blueprint $table) {
            $table->string('nama');  // Menambahkan kolom 'nama'
            $table->text('deskripsi');  // Menambahkan kolom 'deskripsi'
            $table->date('tanggal_mulai');  // Menambahkan kolom 'tanggal_mulai'
            $table->date('tanggal_selesai');  // Menambahkan kolom 'tanggal_selesai'
            $table->string('status');  // Menambahkan kolom 'status'
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
        Schema::table('kegiatan', function (Blueprint $table) {
            $table->dropColumn(['nama', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'status']);
        });
    }
}
