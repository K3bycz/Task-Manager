<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('city', 30)->nullable();
            $table->string('postcode', 20)->nullable();
            $table->string('street', 30)->nullable();
            $table->smallInteger('housenumber')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('country');
            $table->dropColumn('region');
            $table->dropColumn('city');
            $table->dropColumn('postcode');
            $table->dropColumn('street');
            $table->dropColumn('housenumber');
        });
    }
};