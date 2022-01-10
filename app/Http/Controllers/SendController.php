<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Message;
use App\Models\User;


// use Trez\RayganSms\Facades\RayganSms; 
// use Kavenegar\Laravel\ServiceProvider;

class SendController extends Controller
{
    public function verifyCode(Request $request)
    {
        $phone = $request->input('phone');

        $message = Message::getMessage(1);

        $KaveNegar = $this->KaveNegar($phone, $message);
        if ($KaveNegar) {
            User::insertUser($phone, 'KaveNegar', $message, 1);

            return view('/verify');
        }

        $RayganSMS = $this->RayganSMS($phone, $message);
        if ($RayganSMS) {
            User::insertUser($phone, 'RayganSMS', $message, 1);

            return view('/verify');
        }

        User::insertUser($phone);

        return view('/verify');
    }

    public function KaveNegar($phone, $message)
    {
        $result = 1;
        // $result = Kavenegar::Send(092131, $phone, $message); // get response

        if ($result) {
            return true;
        }

        return false;
    }

    public function RayganSMS($phone, $message)
    {
        $result = 1;
        // $result = RayganSms::sendMessage($phone, $message); // get response

        if ($result) {
            return true;
        }

        return false;
    }
}
