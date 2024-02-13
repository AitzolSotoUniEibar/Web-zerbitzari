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
        Schema::create('kantuas', function (Blueprint $table) {
            $table->id();
            $table->string('izena');
            $table->string('genero');
            $table->string('iraupena');
            $table->unsignedBigInteger('dj_id');
            $table->timestamps();

            $table->foreign('dj_id')->references('id')->on('djs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kantuas');
    }
};
