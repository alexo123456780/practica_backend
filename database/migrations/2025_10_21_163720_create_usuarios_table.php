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
        Schema::create('tbl_usuarios', function (Blueprint $table) {
            $table->id('iid');
            $table->string('txtnombre');
            $table->string('txtapellido_paterno')->nullable();
            $table->string('txtapellido_materno')->nullable();
            $table->string('txtemail');
            $table->string('txtpassword');
            $table->string('txtavatar')->nullable();
            $table->enum('enumsexo', ['hombre', 'mujer', 'pepe'])->nullable();
            $table->integer('iedad');
            $table->boolean('bactivo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_usuarios');
    }
};
