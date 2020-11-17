<?php

namespace App\Http\Controllers;

use App\administrasi;
use App\guru;
use App\pengumuman;
use App\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class OlahData extends Controller
{
    public function OlahData(Request $data)
    {
        $data->validate([
            "user" => "required",
            "pw" => "required"
        ]);

        $user = $data->input("user");
        $pass = $data->input("pw");

        if (administrasi::where('Username_administrasi',$user)->where('Password_administrasi',$pass)->exists()) {
            $userLogin = [
                "username" => $user,
                "password"=> $pass
            ];
            Cookie::queue("userLogin",json_encode($userLogin),120);
            $dbPengumuman = pengumuman::all();
            return view("adminlte.index", ["dbpengumuman"=>$dbPengumuman]);
        }
        if (guru::where('NIG',$user)->where('Password_guru',$pass)->exists()) {
            $userLogin = [
                "username" => $user,
                "password"=> $pass
            ];
            Cookie::queue("userLogin",json_encode($userLogin),120);
            $dbPengumuman = pengumuman::all();
            return view("guru.index", ["dbpengumuman"=>$dbPengumuman]);
        }
        if (siswa::where('NISN',$user)->where('Password_siswa',$pass)->exists()) {
            $userLogin = [
                "username" => $user,
                "password"=> $pass
            ];
            Cookie::queue("userLogin",json_encode($userLogin),120);
            $dbPengumuman = pengumuman::all();
            return view("siswa.index", ["dbpengumuman"=>$dbPengumuman]);
        }

    }
}
