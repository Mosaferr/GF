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
        Schema::create('citizenships', function (Blueprint $table) {
            $table->id();
            $table->enum('citizenship', ['polskie', 'amerykańskie', 'brytyjskie', 'francuskie', 'niemieckie', 'ukraińskie', 'inne']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizenships');
    }
};
