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
        Schema::table('experiences', function (Blueprint $table) {
            $table->string('location_type')->default('offline')->after('description_en');
            $table->string('province')->nullable()->after('location_type');
            $table->string('city')->nullable()->after('province');
            $table->string('venue_or_platform')->nullable()->after('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropColumn(['location_type', 'province', 'city', 'venue_or_platform']);
        });
    }
};
