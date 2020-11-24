<?php

namespace App\Http\Controllers;

use App\administrasi;
use App\guru;
use App\pengumuman;
use App\siswa;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $siswa =  [
            "NIS" => $data->user,
            "password" =>$data->pw
        ];
        $admin =  [
            "Id_administrasi" => $data->user,
            "password" =>$data->pw
        ];
        $guru =  [
            "NIG" => $data->user,
            "password" =>$data->pw
        ];

        //cek hashing
        if(Auth::guard('siswa')->attempt($siswa)){
            // Cookie::queue("userLogin",json_encode($siswa),120);
            // $data->session()->put('loggedSiswa', "siswa");
            // dd(Auth::guard('siswa')->user());
            return redirect("dashboardSiswa");
        }
        if(Auth::guard('admin')->attempt($admin)){
            return redirect("homeAdmin");
        }
        if(Auth::guard('guru')->attempt($guru)){
            return redirect("homeGuru");
        }


        // if (siswa::where('NIS',$user)->exists()) {
        //     if(Hash::check($pass, )){

        //     }
        //     $userLogin = [
        //         "username" => $user,
        //         "password"=> $pass
        //     ];
        //     Cookie::queue("userLogin",json_encode($userLogin),120);
        //     $data->session()->put('loggedSiswa', "siswa");
        //     return redirect("dashboardSiswa");
        // }

        $datasiswa=siswa::all();
        foreach($datasiswa as $siswas){
            if($siswas->NIS==$user && Hash::check($pass, $siswas->Password_siswa)){
                $userLogin = [
                    "username" => $user,
                    "password"=> $pass
                ];
                Cookie::queue("userLogin",json_encode($userLogin),120);
                $data->session()->put('loggedSiswa', "siswa");
                return redirect("dashboardSiswa");
            }
        }

        return redirect("/")->with("error","1");


    }
}
