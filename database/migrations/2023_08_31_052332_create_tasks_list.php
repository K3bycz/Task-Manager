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
        Schema::create('tasks_list', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->comment('tytuł');
            $table->text('description')->nullable()->comment('opis');
            $table->dateTime('deadline', $precision = 0)->nullable()->comment('deadline');
            $table->boolean('priority')->nullable()->comment('wysoki priorytet');
            $table->string('category', 20)->nullable()->comment('kategoria');
            $table->string('status', 20)->nullable()->comment('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks_list');}
};
