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
        Schema::create('information_requests', function (Blueprint $table) {
            $table->id();
            $table->sting('ticket_number')->unique(); // Format REQ-********-**** (year, mont, date - no)
            $table->sting('name');
            $table->sting('email');
            $table->sting('phone');
            $table->sting('identity_number');
            $table->sting('subject');
            $table->text('massage');
            $table->sting('attacment')->nullable();
            $table->enum('status', ['pending', 'process', 'completed', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information_requests');
    }
};
