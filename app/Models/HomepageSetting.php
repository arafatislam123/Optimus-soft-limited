<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageSetting extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_description',
        'hero_image',
        'slider_image_1',
        'slider_image_2',
        'slider_image_3',
        'slider_image_4',
        'slider_video_1',
        'slider_video_2',
        'slider_video_3',
        'slider_video_4',
        'about_title',
        'about_description',
        'about_image',
        'contact_email',
        'contact_phone',
        'contact_address',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
    ];
}
