<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function show($Phone)
    {
        $title = "amirabroun";

        return view('home', compact('Phone', 'title'));
        return view('home')->with('name', $title);
    }

    public function query($Phone)
    {
        return view('user', compact('Phone'));
    }
}
