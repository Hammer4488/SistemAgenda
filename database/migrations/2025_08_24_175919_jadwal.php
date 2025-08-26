<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
       Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_akhir');
            $table->enum('tipe', ['Dinas', 'Pribadi']);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
    });

    }

    
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
