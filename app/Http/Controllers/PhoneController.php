<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index()
    {
        $users = $this->getTable();

        return view('admin', compact($users, 'users'));
    }

    public function getTable($phone = null)
    {
        if ($phone) {
            $users = DB::table('users')->where('phone', '=', $phone)->get();
            return $users;
        }

        $users = DB::table('users')->get();

        return $users;
    }

    public function search(Request $request)
    {
        $phone = $request->input('phone');

        $users = $this->getTable($phone);

        return view('search', compact($users, 'users'));
    }
}
