<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Pembuatan', function (Blueprint $table) {
            $table->id('id_Pembuatan'); // PK sendiri untuk fleksibilitas
            $table->foreignId('jadwal_id')->constrained('jadwal')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            
            // Constraint agar tidak ada data duplikat
            $table->unique(['jadwal_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Pembuatan');
    }
};
