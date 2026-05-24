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

            $table->foreignId('news_id')
                ->constrained('news')
                ->onDelete('cascade');

            $table->foreignId('language_id')
                ->constrained('languages')
                ->onDelete('cascade');

            $table->string('title');

            $table->text('description');

            $table->longText('content')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_translations');
    }
};