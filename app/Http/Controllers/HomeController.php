<?php

namespace App\Http\Controllers;

use App\Models\HomepageSetting;
use App\Models\Service;
use App\Models\JobCircular;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $settings = HomepageSetting::first();
        $services = Service::where('is_active', true)
                          ->orderBy('sort_order')
                          ->get();
        $jobCirculars = JobCircular::where('is_active', true)
                                  ->where('application_deadline', '>=', now())
                                  ->latest()
                                  ->take(5)
                                  ->get();

        return Inertia::render('Home', [
            'settings' => $settings,
            'services' => $services,
            'jobCirculars' => $jobCirculars,
        ]);
    }

    public function about()
    {
        $settings = HomepageSetting::first();
        
        return Inertia::render('About', [
            'settings' => $settings,
        ]);
    }

    public function services()
    {
        $services = Service::where('is_active', true)
                          ->orderBy('sort_order')
                          ->get();

        return Inertia::render('Services', [
            'services' => $services,
        ]);
    }

    public function careers()
    {
        $jobCirculars = JobCircular::where('is_active', true)
                                  ->where('application_deadline', '>=', now())
                                  ->latest()
                                  ->get();

        return Inertia::render('Careers', [
            'jobCirculars' => $jobCirculars,
        ]);
    }

    public function contact()
    {
        $settings = HomepageSetting::first();
        
        return Inertia::render('Contact', [
            'settings' => $settings,
        ]);
    }
}
