<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    /**
     * Store an incoming contact inquiry with anti-spam check.
     */
    public function store(StoreContactRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // 1. Silent Honeypot Drop for automated spam bots
        if (! empty($validated['website_hp'])) {
            return redirect()->to(url()->previous().'#contact')
                ->with('success', __('portfolio.contact.success_message'));
        }

        // 2. Persist message with privacy-conscious hashed IP
        ContactMessage::create([
            'name' => strip_tags($validated['name']),
            'email' => $validated['email'],
            'subject' => ! empty($validated['subject']) ? strip_tags($validated['subject']) : null,
            'message' => strip_tags($validated['message']),
            'status' => 'new',
            'ip_hash' => hash('sha256', (string) $request->ip()),
        ]);

        return redirect()->to(url()->previous().'#contact')
            ->with('success', __('portfolio.contact.success_message'));
    }
}
