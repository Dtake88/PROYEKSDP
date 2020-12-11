<?php

namespace App\Http\Controllers;

use App\kelas;
use App\pengumuman;
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
        // dd($dataNilaiSiswa[0]);
        return view("siswa.LihatNilai" , ["nilaiSiswa"=>$dataNilaiSiswa]);
    }

    public function downloadFormatSiswa()
    {
        return Storage::disk('local')->download("formatSiswa/FormatSiswa.xlsx");
    }
}
