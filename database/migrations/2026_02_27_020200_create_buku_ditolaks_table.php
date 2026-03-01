<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('buku_ditolak', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('cover')->nullable();
            $table->text('alasan_penolakan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buku_ditolak');
    }
};