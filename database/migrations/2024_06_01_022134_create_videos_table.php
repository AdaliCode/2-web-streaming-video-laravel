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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('slug', 100)->unique();
            $table->string('category', 100)->default('series');
            $table->date('release')->default('2024/5/29');
            $table->integer('episodeNow')->default(0);
            $table->text('description')->nullable();
            $table->float('rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
