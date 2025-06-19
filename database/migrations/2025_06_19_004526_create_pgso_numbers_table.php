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
        Schema::create('pgso_numbers', function (Blueprint $table) {
            $table->id();
            $table->integer('estab_id');
            $table->integer('ppe_id');
            $table->integer('serv_class');
            $table->integer('inc_pgso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pgso_numbers');
    }
};