<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static function getUser($phone = null)
    {
        if ($phone) {
            return DB::table('users')->where('phone', '=', $phone)->get();
        }

        return DB::table('users')->get();
    }

    
    public static function insertUser($phone, $service = null, $message = null, $status = 0)
    {
        DB::table('users')->insert([
            'phone' => $phone,
            'service' => $service,
            'message' => $message,
            'status' => $status
        ]);
    }
}
