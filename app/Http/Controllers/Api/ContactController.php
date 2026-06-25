<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContactMail;

class ContactController extends Controller
{
    public function index()
    {
        return ContactMessage::latest()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'nullable',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = ContactMessage::create($request->all());

        try {
            // এডমিনকে নোটিফিকেশন পাঠানো (এখানে শুধু ১টি প্যারামিটার যাচ্ছে)
            Mail::to('farukmia7979@gmail.com')->send(new NewContactMail($contact));
        } catch (\Exception $e) {
            \Log::error("Mail error: " . $e->getMessage());
        }

        return response()->json(['message' => 'Success! Message sent.']);
    }

    public function destroy($id)
    {
        $contact = ContactMessage::findOrFail($id);
        $contact->delete();
        return response()->json(['message' => 'Message deleted.']);
    }

    public function reply(Request $request, $id)
    {
        $request->validate(['reply' => 'required']);

        $contact = ContactMessage::findOrFail($id);

        // ইউজারকে রিপ্লাই পাঠানো (এখানে কন্টাক্ট এবং রিপ্লাই টেক্সট ২ টিই যাচ্ছে)
        Mail::to($contact->email)->send(new NewContactMail($contact, $request->reply));

        return response()->json(['message' => 'Reply sent successfully!']);
    }

    public function markAsRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->update(['is_read' => true]);
        return response()->json(['success' => true]);
    }
}