<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of inbound contact messages.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status', 'all');

        $query = ContactMessage::query()->latest();

        if (in_array($status, ['new', 'read', 'replied', 'archived'], true)) {
            $query->where('status', $status);
        }

        $messages = $query->paginate(15)->withQueryString();

        $counts = [
            'all' => ContactMessage::count(),
            'new' => ContactMessage::where('status', 'new')->count(),
            'read' => ContactMessage::where('status', 'read')->count(),
            'replied' => ContactMessage::where('status', 'replied')->count(),
        ];

        return view('admin.messages.index', compact('messages', 'status', 'counts'));
    }

    /**
     * Display the specified contact message details.
     */
    public function show(ContactMessage $message): View
    {
        if ($message->status === 'new') {
            $message->update(['status' => 'read']);
        }

        return view('admin.messages.show', compact('message'));
    }

    /**
     * Update the processing status of a contact message.
     */
    public function updateStatus(Request $request, ContactMessage $message): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:new,read,replied,archived'],
        ]);

        $message->update(['status' => $validated['status']]);

        return back()->with('success', 'Status pesan berhasil diperbarui menjadi '.ucfirst($validated['status']).'.');
    }

    /**
     * Remove the specified contact message from storage.
     */
    public function destroy(ContactMessage $message): RedirectResponse
    {
        $sender = $message->name;
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Pesan dari "'.$sender.'" berhasil dihapus.');
    }
}
