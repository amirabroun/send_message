<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PhoneController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $users = $this->searchPhone($request);
        } else {
            $users = User::getUser();
        }

        return view('admin', compact($users, 'users'));
    }

    public function searchPhone(Request $request)
    {
        return User::getUser($request->input('phone'));
    }
}
