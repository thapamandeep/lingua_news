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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            $table->string('about_site_name')->nullable();
$table->text('about_hero_description')->nullable();

$table->string('feature_1')->nullable();
$table->string('feature_2')->nullable();
$table->string('feature_3')->nullable();
$table->string('feature_4')->nullable();

$table->string('story_title')->nullable();

$table->longText('who_we_are')->nullable();
$table->text('mission_quote')->nullable();
$table->text('vision_content')->nullable();

$table->string('stat1_number')->nullable();
$table->string('stat1_label')->nullable();

$table->string('stat2_number')->nullable();
$table->string('stat2_label')->nullable();

$table->string('stat3_number')->nullable();
$table->string('stat3_label')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
