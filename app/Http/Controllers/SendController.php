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
        // phone, service, description, status

        $phone = $request->input('phone');

        $description = DB::table('messages')->where('status', '=', 'true')->first()->description;

        $status = false;

        // The verify code is send by KaveNegar
        // $result = Kavenegar::Send(092131, $phone, $description); // get response
        $KaveNegar = true;

        // The verify code is send by RayganSMS
        // RayganSms::sendMessage($phone, $description); // get response
        $RayganSMS = false;

        if ($KaveNegar) {

            # status = send is send by service KaveNegar
            $service = 'KaveNegar';

            $status = true;
        } else if ($RayganSMS) {

            # status = send is send by service RayganSMS
            $service = 'RayganSMS';

            $status = true;
        } else {

            $service = null;

            $description = null;
        }

        DB::insert('insert into users (phone, service, description, status) values(?,?,?,?)', [$phone, $service, $description, $status]);

        return view('/verify');
    }
}
