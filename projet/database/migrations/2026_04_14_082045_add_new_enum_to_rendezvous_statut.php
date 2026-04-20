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
        Schema::table('rendezvous', function (Blueprint $table) {
            $table->enum('statut', ['accepted', 'pending', 'cancelled', 'rejected'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rendezvous_statut', function (Blueprint $table) {
            //
        });
    }
};
