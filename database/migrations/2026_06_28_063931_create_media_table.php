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
        Schema::create('media', function (Blueprint $table) {

            $table->id();

            // Relation with news table
            $table->foreignId('news_id')
                  ->constrained('news')
                  ->cascadeOnDelete();

            // Uploaded image
            $table->string('image');

            // SEO
            $table->string('alt_text')->nullable();

            // Optional caption
            $table->text('caption')->nullable();

            // Image type
            $table->enum('media_type', [
                'thumbnail',
                'featured',
                'gallery',
                'banner'
            ])->default('gallery');

            // File information
            $table->string('mime_type')->nullable();

            $table->unsignedBigInteger('file_size')->nullable();

            $table->unsignedInteger('width')->nullable();

            $table->unsignedInteger('height')->nullable();

            // Featured Image
            $table->boolean('is_featured')->default(false);

            // Status
            $table->enum('status', [
                'active',
                'inactive'
            ])->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};