<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class OlahData extends Controller
{
    public function OlahData(Request $data)
    {
        $user = $data->input("user");
        $pass = $data->input("pw");

        if (DB::table('administrasi')->where('Username_administrasi',$user)->where('Password_admin',$pass)->exists()) {
            $userLogin = [
                "username" => $user,
                "password"=> $pass
            ];
            Cookie::queue("userLogin",json_encode($userLogin),120);
            return view("adminlte.index");
        }
        if (DB::table('guru')->where('NIG',$user)->where('Password_guru',$pass)->exists()) {
            $userLogin = [
                "username" => $user,
                "password"=> $pass
            ];
            Cookie::queue("userLogin",json_encode($userLogin),120);
            return view("guru.index");
        }
        if (DB::table('siswa')->where('NIS',$user)->where('Password_siswa',$pass)->exists()) {
            $userLogin = [
                "username" => $user,
                "password"=> $pass
            ];
            Cookie::queue("userLogin",json_encode($userLogin),120);
            return view("siswa.index");
        }


    }
}
