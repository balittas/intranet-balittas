<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->string('judul');
            $table->text('konten');
            $table->string('gambar');
            $table->string('slug');
            $table->char('kategori_artikel_id', 10);
            $table->char('dokumen_id', 10);
            $table->foreign('kategori_artikel_id')->references('id')->on('kategori_artikel')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('dokumen_id')->references('id')->on('dokumen')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('artikel');
    }
}
