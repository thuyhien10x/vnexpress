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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('image_path')->nullable(); // Thêm cột để lưu đường dẫn ảnh, cho phép giá trị null

            $table->timestamps();
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tag');


                });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
