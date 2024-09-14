<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('telefonos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('contacto_id')->constrained('contactos')->onDelete('cascade');
        $table->string('numero', 15)->index();
        $table->string('tipo')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefonos');
    }
};
