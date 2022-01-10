<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        $messages = $this->getMessage();

        return view('message', compact($messages, 'messages'));
    }

    public function messageRequest(Request $request)
    {
        $this->selectMessage($request->input('id'));

        $messages = $this->getMessage();

        return view('message', compact($messages, 'messages'));
    }

    public function selectMessage($id)
    {
        DB::table('messages')->update(['status' => '0']);

        DB::table('messages')->where('id', '=', $id)->update(['status' => '1']);
    }

    public function getMessage()
    {
        return DB::table('messages')->get();
    }
}
