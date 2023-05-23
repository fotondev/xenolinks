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
        Schema::create('duels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('round_id');
            $table->unsignedBigInteger('event_id');
            $table->integer('number')->nullable();
            $table->integer('p1_score')->nullable();
            $table->integer('p2_score')->nullable();

            $table->timestamps();

            $table->foreign('round_id')->references('id')->on('rounds')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('event_id')->references('id')->on('events')
            ->onDelete('cascade')
            ->onUpdate('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duels');
    }
};
