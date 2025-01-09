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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->enum('destination', ['Argentyna i Chile', 'Indonezja', 'Kambodża', 'Peru i Boliwia', 'Sri Lanka', 'Tybet, w Chinach']);
            $table->text('flag')->nullable(); // Zmieniono ze string na text, bo za dużo liter - przekierowania w html
            $table->enum('trip_name', ['W tango pod Andami', 'W świecie kontrastów', 'Królestwo w dżungli', 'W krainie kultu Słońca', 'Budda, herbata i słonie', 'Na Dachu Świata']);
            $table->enum('country', ['Argentyna, Chile', 'Indonezja', 'Kambodża', 'Peru, Boliwia', 'Sri Lanka', 'Tybet, Chiny']);
            // $table->enum('country', ['Argentyna, Chile', 'Indonezja', 'Kambodża, Tajlandia', 'Peru, Boliwia', 'Sri Lanka', 'Tybet, Chiny']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
