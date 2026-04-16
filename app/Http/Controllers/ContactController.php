<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index()
    {
        return view('pages.contact');
    }

    public function store(StoreContactRequest $request)
    {
        $validated = $request->validated();

        ContactSubmission::create($validated);

        return back()
            ->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
