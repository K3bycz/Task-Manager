<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notes_list', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->comment('tytuł');
            $table->text('description')->nullable()->comment('opis');
            $table->text('category')->nullable()->comment('opis');
            $table->binary('attachments')->nullable()->comment('załączniki');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notes_list');
    }
};