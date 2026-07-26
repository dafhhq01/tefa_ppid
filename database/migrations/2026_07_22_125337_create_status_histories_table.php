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
        Schema::create('status_histories', function (Blueprint $table) {
            $table->id();
            // ID Relasi (Bisa buat permohonan informasi atau pengaduan)
            $table->unsignedBigInteger('request_id')->nullable();
            $table->unsignedBigInteger('complaint_id')->nullable();
            $table->string('status');
            $table->text('note');
            $table->unsignedBigInteger('changed_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_histories');
    }
};