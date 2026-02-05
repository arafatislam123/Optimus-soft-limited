<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            $table->string('slider_video_1')->nullable()->after('slider_image_4');
            $table->string('slider_video_2')->nullable()->after('slider_video_1');
            $table->string('slider_video_3')->nullable()->after('slider_video_2');
            $table->string('slider_video_4')->nullable()->after('slider_video_3');
        });
    }

    public function down(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            $table->dropColumn(['slider_video_1', 'slider_video_2', 'slider_video_3', 'slider_video_4']);
        });
    }
};
