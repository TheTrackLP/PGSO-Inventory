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
        Schema::create('serviceables', function (Blueprint $table) {
            $table->id();
            $table->longText('serv_desc')->nullable();
            $table->string('serv_prop')->nullable();
            $table->string('serv_acctg')->nullable();
            $table->string('serv_pgso')->nullable();
            $table->date('serv_date')->nullable();
            $table->tinyInteger('serv_unit')->nullable();
            $table->integer('serv_qty')->nullable();
            $table->float('serv_value')->nullable();
            $table->string('serv_remarks')->nullable();
            $table->integer('serv_estab')->nullable();
            $table->integer('serv_ppe')->nullable();
            $table->tinyInteger('serv_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serviceables');
    }
};