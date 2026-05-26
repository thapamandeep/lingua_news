<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            // BASIC INFO
            $table->string('slug')->unique();
            $table->string('image')->nullable();

            // RELATIONS
            $table->foreignId('category_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('subcategory_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('role_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            // STATUS (good as-is)
            $table->enum('status', ['published', 'draft'])
                ->default('draft');

            // OPTIONAL (recommended for admin tracking)
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};