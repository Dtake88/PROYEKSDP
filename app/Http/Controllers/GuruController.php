<?php

namespace App\Http\Controllers;

use App\guru;
use App\riwayat_akademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GuruController extends Controller
{

    public function toHome()
    {
        return view("guru.index");
    }

    public function pindahInputNilai()
    {
        // dd(Auth::guard('guru')->user()->NIG);
        $sessionGuru= Auth::guard('guru')->user()->NIG;
        // dd($sessionGuru);
        $guru = guru::find($sessionGuru);
        $ajar = $guru->ajar;
        // $kelas = $guru->kelas;
        // $mapel = $guru->mapel;
        // dd($ajar);

        // dd($mapel);
        // iki penggen tak bikin ajax nde selection e
        // jadi awal e kan milih KELAS e ,
        // lek kelas e ganti pilihan MAPEL e bakal ganti pisan , tapi angel hehe
        return view("guru.inputNilai" ,  ["ajar" => $ajar]);
    }

    public function getDaftarNilai(Request  $request)
    {
        $sessionGuru= Auth::guard('guru')->user()->NIG;
        // dd($request->all());
        // $sessionGuru= $request->session()->get('loggedGuru');
        // $NIG = $sessionGuru["username"];
        // $guru = guru::find($sessionGuru["username"]);
        // $kelas = $guru->kelas;
        // $mapel = $guru->mapel; //dari mapel iki ws si GURU ngajar mana , jadi nde riwayat engga perlu diacri NIG e
        $riwayat = riwayat_akademik::where("Id_ajar_mengajar",$request->ajar)->get();
        $guru = guru::find($sessionGuru);
        $ajar = $guru->ajar;
        // dd($riwayat);
        // dd($riwayat[0]->siswa->Nama_siswa);
        return view("guru.inputNilai" ,
        [
            "listNilai" =>$riwayat,
            "ajar" =>$ajar
        ]);
    }

    public function toEditNilai($idRiwayat)
    {
        $riwayat = riwayat_akademik::find($idRiwayat);
        // dd($riwayat);
        return view("guru.formEditNilai",["riwayat"=>$riwayat]);
    }

    public function updateRiwayat(Request $request)
    {
        $riwayat = riwayat_akademik::find($request->idRiwayat);
        $riwayat->Quiz1 = $request->quiz1;
        $riwayat->Quiz2 = $request->quiz2;
        $riwayat->Tugas1 = $request->tugas1;
        $riwayat->Tugas2 = $request->tugas2;
        $riwayat->UTS = $request->UTS;
        $riwayat->UAS = $request->UAS;
        $riwayat->Hasil_akhir = $request->nilaiAkhir;
        $riwayat->Sikap = $request->sikap;
        $riwayat->save();
        // dd($request->all());
        return redirect("inputNilai");
    }

}
