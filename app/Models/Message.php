<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    use HasFactory;

    public static function selectMessage($id)
    {
        DB::table('messages')->update(['status' => '0']);

        DB::table('messages')->where('id', '=', $id)->update(['status' => '1']);
    }

    public static function getMessage($status = null)
    {
        if ($status) {
            return (DB::table('messages')->where('status', '=', $status)->first()->message);
        }

        return DB::table('messages')->get();
    }
}
