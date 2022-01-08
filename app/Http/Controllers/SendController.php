<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use Trez\RayganSms\Facades\RayganSms; 
// use Kavenegar\Laravel\ServiceProvider;

class SendController extends Controller
{
    public function verifyCode(Request $request)
    {
        $phone = $request->input('phone');

        $message = $this->getMessage();

        $KaveNegar = $this->kaveNegar($phone, $message);

        if (!$KaveNegar) {

            $this->insertDatabase($phone, 'KaveNegar', $message, 1);

            return view('/verify');
        }

        $RayganSMS = $this->RayganSMS($phone, $message);

        if ($RayganSMS) {

            $this->insertDatabase($phone, 'RayganSMS', $message, 1);

            return view('/verify');
        }

        $this->insertDatabase($phone);

        return view('/verify');
    }

    public function kaveNegar($phone, $message)
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

    public function insertDatabase($phone, $service = null, $message = null, $status = 0)
    {
        DB::table('users')->insert([
            'phone' => $phone,
            'service' => $service,
            'message' => $message,
            'status' => $status
        ]);
    }

    public function getMessage()
    {
        return (DB::table('messages')->where('status', '=', 1)->first('message')->message);
    }
}
