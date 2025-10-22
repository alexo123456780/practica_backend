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
        Schema::create('tbl_modulo_roles', function (Blueprint $table) {
            $table->id('iid');
            $table->unsignedBigInteger('iidmodulo');
            $table->foreign('iidmodulo')->references('iid')->on('tbl_modulos')->onDelete('cascade');
            $table->unsignedBigInteger('iidrol');
            $table->foreign('iidrol')->references('iid')->on('tbl_roles')->onDelete('cascade');
            $table->boolean('bactivo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_modulo_roles');
    }
};
