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
        Schema::create('liburuas', function (Blueprint $table) {
            $table->id();
            $table->string('izena');
            $table->unsignedBigInteger('autorea_id');
            $table->text('deskribapena');
            $table->timestamps();

            $table->foreign('autorea_id')->references('id')->on('autoreas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liburuas');
    }
};
