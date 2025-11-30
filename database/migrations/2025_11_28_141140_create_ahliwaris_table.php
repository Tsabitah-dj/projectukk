<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ahliwaris', function (Blueprint $table) {
            $table->id();

            // foreign key ke tabel dataahliwaris
            $table->foreignId('dataahliwaris_id')
                  ->constrained('dataahliwaris')
                  ->onDelete('cascade');
            $table->date('tanggal');
            $table->string('no_register')->unique();
            $table->text('alamat');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ahliwaris');
    }
};
