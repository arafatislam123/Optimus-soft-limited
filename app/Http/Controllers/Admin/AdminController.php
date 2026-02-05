<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Service;
use App\Models\JobCircular;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_contacts' => Contact::count(),
            'unread_contacts' => Contact::where('is_read', false)->count(),
            'total_services' => Service::count(),
            'active_jobs' => JobCircular::where('is_active', true)
                                      ->where('application_deadline', '>=', now())
                                      ->count(),
        ];

        $recentContacts = Contact::latest()->take(5)->get();

        return Inertia::render('Admin/Dashboard', [
            'stats' => $stats,
            'recentContacts' => $recentContacts,
        ]);
    }

    public function contacts()
    {
        $contacts = Contact::latest()->paginate(20);

        return Inertia::render('Admin/Contacts', [
            'contacts' => $contacts,
        ]);
    }

    public function markContactAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Contact marked as read.');
    }
}
