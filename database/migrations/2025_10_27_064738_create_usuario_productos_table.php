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
        Schema::create('tbl_usuario_productos', function (Blueprint $table) {
            $table->id('iid');
            $table->unsignedBigInteger('iidproducto');
            $table->foreign('iidproducto')->references('iid')->on('tbl_productos')->onDelete('cascade');
            $table->unsignedBigInteger('iidusuario');
            $table->foreign('iidusuario')->references('iid')->on('tbl_usuarios')->onDelete('cascade');
            $table->boolean('bactivo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_usuario_productos');
    }
};
