<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news_translations', function (Blueprint $table) {

            $table->id();

            // NEWS RELATION
            $table->foreignId('news_id')
                ->constrained('news')
                ->onDelete('cascade');

            // LANGUAGE RELATION
            $table->foreignId('language_id')
                ->constrained('languages')
                ->onDelete('cascade');

            // CONTENT
            $table->string('title');
            $table->text('description');
            $table->longText('content')->nullable();

            $table->timestamps();

            // 🔥 IMPORTANT: prevent duplicate language per news
            $table->unique(['news_id', 'language_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_translations');
    }
};