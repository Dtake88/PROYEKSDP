<?php

namespace App\Http\Controllers;

use App\guru;
use App\riwayat_akademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GuruController extends Controller
{

    public function toHome()
    {
        return view("guru.index");
    }



    public function pindahInputNilai()
    {
        $sessionGuru= Session::get("loggedGuru")  ;
        // dd($sessionGuru);
        $guru = guru::find($sessionGuru["username"]);
        $kelas = $guru->kelas;
        $mapel = $guru->mapel;
        // dd($mapel);
        // iki penggen tak bikin ajax nde selection e
        // jadi awal e kan milih KELAS e ,
        // lek kelas e ganti pilihan MAPEL e bakal ganti pisan , tapi angel hehe
        return view("guru.inputNilai" ,  ["kelas" => $kelas , "mapel" =>$mapel]);
    }

    public function getDaftarNilai(Request  $request)
    {
        // dd($request->all());
        $sessionGuru= $request->session()->get('loggedGuru');
        $NIG = $sessionGuru["username"];
        $guru = guru::find($sessionGuru["username"]);
        $kelas = $guru->kelas;
        $mapel = $guru->mapel; //dari mapel iki ws si GURU ngajar mana , jadi nde riwayat engga perlu diacri NIG e
        $riwayat = riwayat_akademik::where("Id_kelas",$request->kelas)
        ->where("Id_mapel",$request->mapel)
        ->get();

        // dd($riwayat[0]->siswa->Nama_siswa);
        return view("guru.inputNilai" ,
        [
            "kelas" => $kelas ,
            "mapel" =>$mapel,
            "listNilai" =>$riwayat
        ]);


    }


}
