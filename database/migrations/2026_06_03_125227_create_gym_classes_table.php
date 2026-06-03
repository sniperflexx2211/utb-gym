<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gym_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('trainer_id')->constrained()->onDelete('cascade'); // One-to-Many
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // One-to-Many
            $table->integer('capacity')->default(20);
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('day', ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gym_classes');
    }
};