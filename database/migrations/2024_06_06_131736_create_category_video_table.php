<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // tahapan migration
    // 1. php artisan make:migration create_category_video_table --create=category_video
    // 2. php artisan migrate:fresh
    // 3. php artisan migrate:rollback --step=1
    // 4. php artisan migrate
    // 5. php artisan db:seed
    public function up(): void
    {
        Schema::create('category_video', function (Blueprint $table) {
            $table->id();
            $table->string('category_id', 100);
            $table->unsignedBiginteger('video_id');
            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade');
            $table->foreign('video_id')->references('id')
                ->on('videos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_video');
    }
};
