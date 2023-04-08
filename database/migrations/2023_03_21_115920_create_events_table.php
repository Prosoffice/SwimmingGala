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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id');
            $table->integer('distance');
            $table->foreignId('stroke_id');
            $table->foreignId('gala_id')->nullable();
            $table->foreignId('swimmer_id');
            $table->float('finish_time');
            $table->enum('event_type', ['Training', 'Official']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
