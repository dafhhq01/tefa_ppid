<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('procurement_packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->year('year');
            $table->enum('stage', ['perencanaan', 'pemilihan', 'pelaksanaan'])->nullable(); // Bisa nullable karena RUP (parent) mungkin tidak memiliki stage
            $table->string('file')->nullable();
            $table->string('external_url')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('procurement_packages')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procurement_packages');
    }
};
