<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PindahHalaman extends Controller
{


    public function PindahDashboardSiswa()
    {
        return view("siswa.index");
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
