<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Services\ContactService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    protected ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $data = $this->contactService->getContactData();

        return view('contact', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Message::create($request->only('name', 'email', 'message'));

        try {
            $adminEmail = 'jahidcse181@gmail.com'; 
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'messageBody' => $request->message,
            ];

            Mail::send([], [], function ($message) use ($adminEmail, $data) {
                $message->to($adminEmail)
                        ->replyTo($data['email'], $data['name'])
                           ->subject('📩 New Message Form Client')
                        ->html("
                            <h3>New Contact Message Received</h3>
                            <p><strong>Name:</strong> {$data['name']}</p>
                            <p><strong>Email:</strong> {$data['email']}</p>
                            <p><strong>Message:</strong><br>{$data['messageBody']}</p>
                        ");
            });
        } catch (\Exception $e) {
            \Log::error('Contact form email failed: '.$e->getMessage());
        }

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function markAsRead($id)
    {
        $message = Message::findOrFail($id);
        $message->status = 'read';
        $message->save();

        return redirect()->back()->with('success', 'Message marked as read.');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
}
