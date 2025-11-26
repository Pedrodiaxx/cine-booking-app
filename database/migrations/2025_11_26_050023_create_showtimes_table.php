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
    Schema::create('showtimes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('movie_id')->constrained()->onDelete('cascade');
        $table->foreignId('room_id')->constrained()->onDelete('cascade');
        $table->date('date');           // Fecha de la función
        $table->time('start_time');     // Hora de inicio
        $table->integer('available_seats'); // Asientos disponibles (autocalculado)
        $table->boolean('active')->default(true);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showtimes');
    }
};
