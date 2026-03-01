<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('permintaan_buku', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('petugas_id');
        $table->string('judul');
        $table->string('penulis');
        $table->string('penerbit');
        $table->integer('tahun_terbit');
        $table->integer('stok');
        $table->unsignedBigInteger('kategori_id');
        $table->text('deskripsi')->nullable();
        $table->string('gambar')->nullable();
        $table->enum('status', ['Pending','Disetujui','Ditolak'])->default('Pending');
        $table->string('alasan_tolak')->nullable();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('permintaan_buku');
    }
};