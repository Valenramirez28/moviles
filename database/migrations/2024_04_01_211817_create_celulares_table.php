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
        Schema::create('celulares', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('nombre_modelo');
            $table->string('memoria_interna');
            $table->string('memoria_ram');
            $table->string('resolucion_camara');
            $table->decimal('precio');
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('celulares');
    }
};
