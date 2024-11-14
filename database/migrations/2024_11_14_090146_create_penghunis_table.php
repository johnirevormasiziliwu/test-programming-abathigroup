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
        Schema::create('penghunis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartemen_id')->constrained('apartemens')->cascadeOnUpdate()->cascadeOnDelete(); 
            $table->string('name');
            $table->enum('jenis_kelamin', ['L', 'P'])->default('L');
            $table->date('tanggal_lahir');
            $table->integer('umur');
            $table->enum('status', ['menikah', 'belum menikah']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghunis');
    }
};
