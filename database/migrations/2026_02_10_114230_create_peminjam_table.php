<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjam', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('status')->default('aktif'); // atau menunggu/ditolak, dll.
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjam');
    }
};
