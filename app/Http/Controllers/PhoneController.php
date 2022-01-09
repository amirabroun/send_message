<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function users(Request $request)
    {
        if ($request) {

            $users = $this->search($request);

            return view('admin', compact($users, 'users'));
        }

        $users = $this->getUserTable();

        return view('admin', compact($users, 'users'));
    }

    public function messages()
    {
        $messages = $this->getMessageTable();

        return view('message', compact($messages, 'messages'));
    }


    public function messageRequest(Request $request)
    {
        $message_id = $request->input('id');

        $this->selectMessage($message_id);

        $messages = $this->getMessageTable();

        return view('message', compact($messages, 'messages'));
    }


    public function selectMessage($id)
    {
        DB::table('messages')->update(['status' => '0']);
        DB::table('messages')->where('id', '=', $id)->update(['status' => '1']);
    }

    public function getUserTable($phone = null)
    {
        if ($phone) {
            $users = DB::table('users')->where('phone', '=', $phone)->get();
            return $users;
        }

        $users = DB::table('users')->get();

        return $users;
    }

    public function getMessageTable()
    {
        $message = DB::table('messages')->get();

        return $message;
    }

    public function search(Request $request)
    {
        $phone = $request->input('phone');

        $users = $this->getUserTable($phone);

        return $users;
    }
}
