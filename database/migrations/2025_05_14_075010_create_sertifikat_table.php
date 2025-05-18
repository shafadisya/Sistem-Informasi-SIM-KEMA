<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertifikatTable extends Migration
{
    public function up()
    {
        Schema::create('sertifikat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->string('file'); // Link Google Drive
            $table->date('tanggal_terbit');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sertifikat');
    }
}
