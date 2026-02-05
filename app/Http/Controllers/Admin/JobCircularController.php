<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCircular;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobCircularController extends Controller
{
    public function index()
    {
        $jobCirculars = JobCircular::latest()->get();
        
        return Inertia::render('Admin/JobCirculars/Index', [
            'jobCirculars' => $jobCirculars,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/JobCirculars/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'job_type' => 'required|string|in:Full-time,Part-time,Contract,Internship',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0|gte:salary_min',
            'application_deadline' => 'required|date|after:today',
            'is_active' => 'boolean',
        ]);

        JobCircular::create($validated);

        return redirect()->route('admin.job-circulars.index')
                        ->with('success', 'Job circular created successfully!');
    }

    public function show(JobCircular $jobCircular)
    {
        return Inertia::render('Admin/JobCirculars/Show', [
            'jobCircular' => $jobCircular,
        ]);
    }

    public function edit(JobCircular $jobCircular)
    {
        return Inertia::render('Admin/JobCirculars/Edit', [
            'jobCircular' => $jobCircular,
        ]);
    }

    public function update(Request $request, JobCircular $jobCircular)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'job_type' => 'required|string|in:Full-time,Part-time,Contract,Internship',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0|gte:salary_min',
            'application_deadline' => 'required|date',
            'is_active' => 'boolean',
        ]);

        $jobCircular->update($validated);

        return redirect()->route('admin.job-circulars.index')
                        ->with('success', 'Job circular updated successfully!');
    }

    public function destroy(JobCircular $jobCircular)
    {
        $jobCircular->delete();

        return redirect()->route('admin.job-circulars.index')
                        ->with('success', 'Job circular deleted successfully!');
    }
}
