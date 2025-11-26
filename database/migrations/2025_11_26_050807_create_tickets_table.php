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
    Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->string('code'); // Código del boleto TCK-0001
        $table->unsignedBigInteger('movie_id');
        $table->unsignedBigInteger('room_id');
        $table->dateTime('show_time');  // Hora de función
        $table->decimal('price', 8, 2);
        $table->string('seat'); // Ej: A5, B3
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
