<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {

            $users = $this->search($request);
            
            return view('admin', compact($users, 'users'));
        }

        $users = $this->getAdminTable();

        return view('admin', compact($users, 'users'));
    }

    public function getAdminTable($phone = null)
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

        $users = $this->getAdminTable($phone);

        return $users;
    }
}
