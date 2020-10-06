<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OlahData extends Controller
{
    public function OlahData(Request $data)
    {
        $user = $data->input("user");
        $pass = $data->input("pw");

        if ($user == "admin" && $pass == "admin") {
            $userLogin = [
                "username" => $user,
                "password"=> $pass
            ];
            Cookie::queue("userLogin",json_encode($userLogin),120);
            return view("adminlte.index");
        }
        if ($user == "guru" && $pass == "guru") {
            $userLogin = [
                "username" => $user,
                "password"=> $pass
            ];
            Cookie::queue("userLogin",json_encode($userLogin),120);
            return view("guru.index");
        }
        if ($user == "siswa" && $pass == "siswa") {
            $userLogin = [
                "username" => $user,
                "password"=> $pass
            ];
            Cookie::queue("userLogin",json_encode($userLogin),120);
            return view("siswa.index");
        }


    }
}
