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
        Schema::create('dana', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->integer('dana');
            $table->integer('balance');
            $table->integer('type')->default(0);
            $table->string('keterangan')->nullable();
            $table->string('nota')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dana');
    }
};
