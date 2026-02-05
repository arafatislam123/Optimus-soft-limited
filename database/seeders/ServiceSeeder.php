<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Web Application Development',
                'description' => 'Custom web applications built with modern technologies like Laravel, React, Vue.js, and more. Scalable, secure, and user-friendly solutions.',
                'sort_order' => 1,
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Native and cross-platform mobile applications for iOS and Android. Flutter, React Native, and native development services.',
                'sort_order' => 2,
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Comprehensive digital marketing services including SEO, social media marketing, content marketing, and online advertising campaigns.',
                'sort_order' => 3,
            ],
            [
                'title' => 'Business Solutions',
                'description' => 'Custom business software solutions, ERP systems, CRM platforms, and workflow automation to streamline your business processes.',
                'sort_order' => 4,
            ],
            [
                'title' => 'Hardware Solutions',
                'description' => 'Complete hardware solutions including system integration, network setup, server configuration, and IT infrastructure management.',
                'sort_order' => 5,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
