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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('birth_date');
            $table->enum('gender', ['M', 'F']);
            $table->enum('stage', ['zarezerwowany', 'zapisany', 'przedpłacone', 'opłacone', 'rezygnacja']);
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('pesel');
            $table->foreignId('citizenship_id')->constrained()->onDelete('cascade');
            $table->string('passport_number');
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->foreignId('address_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('leader_id')->nullable();                        // Zwykła kolumna, nie klucz obcy
            // $table->foreignId('leader_id')->nullable()->constrained('clients')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
