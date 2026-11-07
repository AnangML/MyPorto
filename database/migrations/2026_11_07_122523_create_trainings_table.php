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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('title_id');
            $table->string('title_en')->nullable();
            $table->string('organizer');
            $table->string('vocation');
            $table->string('sub_vocation');
            $table->string('type')->default('seminar'); // seminar, training, workshop, certification, course
            $table->string('location_type')->default('offline'); // offline, online, international
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('venue_or_platform')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('certificate_file_path')->nullable();
            $table->string('certificate_url')->nullable();
            $table->text('description_id')->nullable();
            $table->text('description_en')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();

            $table->index(['sub_vocation', 'is_visible']);
            $table->index(['is_visible', 'sort_order']);
            $table->index('start_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
