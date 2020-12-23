<?php

namespace App\Http\Controllers;

use App\ajar_mengajar;
use App\guru;
use App\kelas;
use App\mapel;
use App\riwayat_akademik;
use App\siswa;
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
        $sessionGuru= Auth::guard('guru')->user()->NIG;

        $DBAjar_mengajar = ajar_mengajar::select('id_kelas')->where('status_jadwal',1)->where("NIG",$sessionGuru)->get();
        // dd($DBAjar_mengajar);
        // $guru = guru::find($sessionGuru);
        // $ajar = $guru->ajar;
        // dd($sessionGuru);
        $DBkelas = kelas::select('Id_kelas')->whereIn("Id_kelas", $DBAjar_mengajar)->get();
        // dd($DBkelas);
        // dd($DBkelas[0]->Id_kelas);
        // $DBsiswa = siswa::where('id_kelas',$DBkelas[0]->Id_kelas)->get();

        $listNilai = riwayat_akademik::whereIn('id_kelas',$DBkelas)->get();
        // dd($listNilai);
        return view("guru.inputNilai" ,  [
            // "ajar" => $ajar,
            // "DBsiswa"=>$DBsiswa,
            "listNilai"=>$listNilai
            ]);
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

    public function keFilterRiwayat()
    {
        $DBriwayat = riwayat_akademik::all();
        $DBsiswa = siswa::all();
        $DBkelas = kelas::all();
        $DBmapel = mapel::all();
        $DBAjar_mengajar = ajar_mengajar::all();
        return view("guru.filterriwayat",[
            "DBAjar_mengajar"=>$DBAjar_mengajar,
            "DBriwayat"=>$DBriwayat,
            "DBsiswa"=>$DBsiswa,
            "DBkelas"=>$DBkelas,
            "DBmapel"=>$DBmapel
        ]);
    }

    public function filterRiwayatGuru(Request $request)
    {
        $DBriwayat = riwayat_akademik::all();


        if($request->filterajarmengajar != "none" ){
            $DBriwayat=$DBriwayat->where("Id_ajar_mengajar", $request->filterajarmengajar);
        }

        if($request->nama != "" ){
            $nis=siswa::where("Nama_siswa",'like','%'.$request->nama.'%')->pluck("NIS");
            $DBriwayat=riwayat_akademik::whereIn("NIS", $nis)->get();
        }

        if($request->filterajarmengajar != "none" && $request->nama != ""){
            $nis=siswa::where("Nama_siswa",'like','%'.$request->nama.'%')->pluck("NIS");
            $DBriwayat=riwayat_akademik::whereIn("NIS", $nis)->where("Id_ajar_mengajar", $request->filterajarmengajar)->get();
        }

        $DBsiswa = siswa::all();
        $DBkelas = kelas::all();
        $DBmapel = mapel::all();
        $DBAjar_mengajar = ajar_mengajar::all();
        return view("guru.filterriwayat",[
            "DBAjar_mengajar"=>$DBAjar_mengajar,
            "DBriwayat"=>$DBriwayat,
            "DBsiswa"=>$DBsiswa,
            "DBkelas"=>$DBkelas,
            "DBmapel"=>$DBmapel
        ]);
    }

}
