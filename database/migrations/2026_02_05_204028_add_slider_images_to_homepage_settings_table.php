<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            $table->string('slider_image_1')->nullable()->after('hero_image');
            $table->string('slider_image_2')->nullable()->after('slider_image_1');
            $table->string('slider_image_3')->nullable()->after('slider_image_2');
            $table->string('slider_image_4')->nullable()->after('slider_image_3');
        });
    }

    public function down(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            $table->dropColumn(['slider_image_1', 'slider_image_2', 'slider_image_3', 'slider_image_4']);
        });
    }
};
