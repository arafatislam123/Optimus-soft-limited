<?php

namespace Database\Seeders;

use App\Models\HomepageSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomepageSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomepageSetting::create([
            'hero_title' => 'Welcome to Optimus Software Limited',
            'hero_description' => 'Leading provider of innovative software solutions, web development, mobile applications, digital marketing, business solutions, and hardware solutions. Transform your business with our cutting-edge technology.',
            'about_title' => 'About Optimus Software Limited',
            'about_description' => 'We are a leading software development company specializing in web applications, mobile apps, digital marketing, business solutions, and hardware solutions. Our team of experienced professionals is dedicated to delivering innovative and scalable solutions that drive business growth and digital transformation.',
            'contact_email' => 'info@optimussoftware.com',
            'contact_phone' => '+880 1234 567890',
            'contact_address' => 'Dhaka, Bangladesh',
            'facebook_url' => 'https://facebook.com/optimussoftware',
            'twitter_url' => 'https://twitter.com/optimussoftware',
            'linkedin_url' => 'https://linkedin.com/company/optimussoftware',
            'instagram_url' => 'https://instagram.com/optimussoftware',
        ]);
    }
}
