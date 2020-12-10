<?php

namespace App\Http\Controllers;

use App\pengumuman;
use Illuminate\Http\Request;
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
        return view("siswa.biodata");
    }
    public function EditBiodata()
    {
        return redirect('/biodata')->with('message', 'Hubungi TU untuk mengganti biodata');
    }
    public function LihatNilai()
    {
        return view("siswa.LihatNilai");
    }

    public function downloadFormatSiswa()
    {
        return Storage::disk('local')->download("formatSiswa/FormatSiswa.xlsx");
    }
}
