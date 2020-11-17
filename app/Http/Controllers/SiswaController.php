<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function PindahDashboardSiswa()
    {
        return view("siswa.dashboard");
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
        return view("siswa.EditBiodata");
    }
    public function LihatNilai()
    {
        return view("siswa.LihatNilai");
    }
}
