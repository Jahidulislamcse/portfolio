<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messages()
    {

        $messages = Message::where('status', 'read')
                   ->latest()
                   ->paginate(10);

        return view('admin.messages', compact('messages'));
    }
}
