<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $users = $this->searchPhone($request);
        } else {
            $users = $this->getUser();
        }

        return view('admin', compact($users, 'users'));
    }

    public function getUser($phone = null)
    {
        if ($phone) {
            return DB::table('users')->where('phone', '=', $phone)->get();
        }

        return DB::table('users')->get();
    }

    public function searchPhone(Request $request)
    {
        return $this->getUser($request->input('phone'));
    }
}
