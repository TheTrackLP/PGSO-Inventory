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
        Schema::create('establisments', function (Blueprint $table) {
            $table->id();
            $table->string('estab_acronym')->nullable();
            $table->integer('estab_code')->nullable();
            $table->string('estab_name')->nullable();
            $table->string('estab_incharge')->nullable();
            $table->string('estab_position')->nullable();
            $table->integer('estab_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('establisments');
    }
};