<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class HomepageSettingController extends Controller
{
    public function index()
    {
        $settings = HomepageSetting::first();
        
        return Inertia::render('Admin/HomepageSettings', [
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slider_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slider_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slider_image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slider_image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slider_video_1' => 'nullable|mimes:mp4,mov,avi,wmv|max:51200', // 50MB max
            'slider_video_2' => 'nullable|mimes:mp4,mov,avi,wmv|max:51200',
            'slider_video_3' => 'nullable|mimes:mp4,mov,avi,wmv|max:51200',
            'slider_video_4' => 'nullable|mimes:mp4,mov,avi,wmv|max:51200',
            'about_title' => 'required|string|max:255',
            'about_description' => 'nullable|string',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string|max:20',
            'contact_address' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
        ]);

        $settings = HomepageSetting::first();
        
        if (!$settings) {
            $settings = new HomepageSetting();
        }

        // Handle hero image upload
        if ($request->hasFile('hero_image')) {
            if ($settings->hero_image) {
                Storage::disk('public')->delete($settings->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('images', 'public');
        }

        // Handle slider images upload
        for ($i = 1; $i <= 4; $i++) {
            $fieldName = "slider_image_$i";
            if ($request->hasFile($fieldName)) {
                if ($settings->$fieldName) {
                    Storage::disk('public')->delete($settings->$fieldName);
                }
                $validated[$fieldName] = $request->file($fieldName)->store('images', 'public');
            }
        }

        // Handle slider videos upload
        for ($i = 1; $i <= 4; $i++) {
            $fieldName = "slider_video_$i";
            if ($request->hasFile($fieldName)) {
                if ($settings->$fieldName) {
                    Storage::disk('public')->delete($settings->$fieldName);
                }
                $validated[$fieldName] = $request->file($fieldName)->store('videos', 'public');
            }
        }

        // Handle about image upload
        if ($request->hasFile('about_image')) {
            if ($settings->about_image) {
                Storage::disk('public')->delete($settings->about_image);
            }
            $validated['about_image'] = $request->file('about_image')->store('images', 'public');
        }

        $settings->fill($validated);
        $settings->save();

        return redirect()->back()->with('success', 'Homepage settings updated successfully!');
    }
}
