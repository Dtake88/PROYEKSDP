<?php

namespace App\Http\Controllers;

use App\administrasi;
use App\guru;
use App\siswa;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class OlahData extends Controller
{
    public function OlahData(Request $data)
    {
        // dd($data->all());
        $data->validate([
            "user" => "required",
            "pw" => "required"
        ]);

        $user = $data->input("user");
        $pass = $data->input("pw");

        //cek hashing
        if (administrasi::where('Username_administrasi',$user)->where('Password_admin',$pass)->exists()) {
            $userLogin = [
                "username" => $user,
                "password"=> $pass
            ];
            Cookie::queue("userLogin",json_encode($userLogin),120);
            $data->session()->put('loggedAdmin', "admin");
            return redirect("homeAdmin");
        }

        if (guru::where('NIG',$user)->where('Password_guru',$pass)->exists()) {
            $userLogin = [
                "username" => $user,
                "password"=> $pass
            ];
            Cookie::queue("userLogin",json_encode($userLogin),120);
            $data->session()->put('loggedGuru', $userLogin);
            return redirect("homeGuru");
        }


        if (siswa::where('NIS',$user)->where('Password_siswa',$pass)->exists()) {
            $userLogin = [
                "username" => $user,
                "password"=> $pass
            ];
            Cookie::queue("userLogin",json_encode($userLogin),120);
            $data->session()->put('loggedSiswa', "siswa");
            return redirect("dashboardSiswa");
        }

        return redirect("/")->with("error","1");


    }
}
