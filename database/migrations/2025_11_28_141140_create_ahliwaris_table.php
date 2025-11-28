<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ahliwaris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('nama_alm');
            $table->date('tanggal');             
            $table->string('no_register')->unique();
            $table->text('alamat');
            $table->string('bukti_register')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ahliwaris');
    }
};
