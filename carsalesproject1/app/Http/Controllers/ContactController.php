<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:1000',
        ]);

        // Store the contact message
        Contact::create($validated);

        // Redirect back with a success message
        return back()->with('success', 'Your message has been sent successfully.');
    }
}
