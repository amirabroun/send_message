<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::getMessage();

        return view('message', compact($messages, 'messages'));
    }

    public function messageRequest(Request $request)
    {
        Message::selectMessage($request->input('id'));

        $messages = Message::getMessage();

        return view('message', compact($messages, 'messages'));
    }
}
