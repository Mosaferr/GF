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
        Schema::create('clients_dates', function (Blueprint $table) {
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('date_id')->constrained()->onDelete('cascade');
            $table->primary(['client_id', 'date_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_dates');
    }
};
