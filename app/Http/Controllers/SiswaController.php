<?php

namespace App\Http\Controllers;

use App\kelas;
use App\mapel;
use App\pengumuman;
use App\periode_akademik;
use App\riwayat_akademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    //
    public function PindahDashboardSiswa()
    {

        $pengumuman = pengumuman::all();
        return view("siswa.dashboard" , ["pengumuman"=>$pengumuman]);
    }
    public function PindahJurusan()
    {
        
        // redirect()->back();
        return view("siswa.jurusan");
    }
    public function PindahBiodata()
    {
        $Databiodata=Auth::guard('siswa')->user();
        return view("siswa.biodata" , ["biodata"=>$Databiodata]);
    }
    public function EditBiodata()
    {
        return redirect('/biodata')->with('message', 'Hubungi TU untuk mengganti biodata');
    }
    public function LihatNilai()
    {
        $Databiodata=Auth::guard('siswa')->user();
        $dataNilaiSiswa = riwayat_akademik::with('kelas')->with('mapel')->where("NIS",$Databiodata->NIS)->get();
        //cari periode
        $DBriwayat = riwayat_akademik::select('Id_kelas')->whereIn('NIS', $Databiodata)->get();
        $DBkelas = kelas::select('Id_periode')->whereIn('Id_kelas',$DBriwayat)->get();
        // dd($DBkelas);
        $DBperiode = periode_akademik::whereIn('Id_periode',$DBkelas)->get();
        // dd($DBperiode);
        // $DBperiode = periode_akademik::


        // dd($dataNilaiSiswa[0]);
        return view("siswa.filterriwayat" , [
            "DBriwayat"=>$dataNilaiSiswa,
            "DBperiode"=>$DBperiode]);
    }

    public function FilterNilai(Request $request)
    {
        $Databiodata=Auth::guard('siswa')->user();
        // dd($Databiodata->NIS);

        // $DBriwayat = riwayat_akademik::all();

        if($request->filterajarmengajar != "none" ){
            // dd($DBkelas);
            $DBkelas = kelas::select('Id_kelas')->where('Id_periode',$request->filterajarmengajar)->where('Id_kelas',$Databiodata->Id_kelas)->get();
            // dd($DBkelas);
            $lihatNilaiSiswaFilter =riwayat_akademik::with('kelas')->with('mapel')->where('NIS', $Databiodata->NIS)->whereIn('Id_kelas',$DBkelas)->get();
            // dd($DBRiwayat);
        }
        //cari periode
        $DBriwayat = riwayat_akademik::select('Id_kelas')->whereIn('NIS', $Databiodata)->get();
        $DBkelas = kelas::select('Id_periode')->whereIn('Id_kelas',$DBriwayat)->get();
        // dd($DBkelas);
        $DBperiode = periode_akademik::whereIn('Id_periode',$DBkelas)->get();
        // dd($DBperiode);
        // $DBperiode = periode_akademik::

        // dd($dataNilaiSiswa[0]);
        return view("siswa.filterriwayat" , [
            "DBriwayat"=>$lihatNilaiSiswaFilter,
            "DBperiode"=>$DBperiode]);


    }

    public function downloadFormatSiswa()
    {
        return Storage::disk('local')->download("formatSiswa/FormatSiswa.xlsx");
    }
}
