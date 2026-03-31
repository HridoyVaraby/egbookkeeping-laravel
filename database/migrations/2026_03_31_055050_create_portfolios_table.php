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
        Schema::create('portfolios', function (Blueprint $col) {
            $col->id();
            $col->string('title');
            $col->string('slug')->unique();
            $col->string('client_name')->nullable();
            $col->string('industry')->nullable();
            $col->date('project_date')->nullable();
            $col->longText('description')->nullable();
            $col->json('images')->nullable();
            $col->boolean('is_featured')->default(false);
            $col->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
