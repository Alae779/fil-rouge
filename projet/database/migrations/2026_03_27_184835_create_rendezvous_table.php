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
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('heure');
            $table->enum('statut', ['pending', 'accepted', 'cancelled'])->default('pending');
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('consultation_id')->constrained('consultations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendezvous');
    }
};
