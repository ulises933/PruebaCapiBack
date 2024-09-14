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
    Schema::create('direcciones', function (Blueprint $table) {
        $table->id();
        $table->foreignId('contacto_id')->constrained('contactos')->onDelete('cascade');
        $table->text('direccion');
        $table->string('ciudad')->nullable()->index();
        $table->string('estado')->nullable()->index();
        $table->string('pais')->nullable()->index();
        $table->string('codigo_postal')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direccions');
    }
};
