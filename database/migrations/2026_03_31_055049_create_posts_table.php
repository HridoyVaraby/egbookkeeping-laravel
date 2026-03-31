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
        Schema::create('posts', function (Blueprint $col) {
            $col->id();
            $col->string('title');
            $col->string('slug')->unique();
            $col->longText('body')->nullable();
            $col->text('excerpt')->nullable();
            $col->string('featured_image')->nullable();
            $col->boolean('is_published')->default(false);
            $col->string('meta_title')->nullable();
            $col->text('meta_description')->nullable();
            $col->foreignId('category_id')->constrained()->cascadeOnDelete();
            $col->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
