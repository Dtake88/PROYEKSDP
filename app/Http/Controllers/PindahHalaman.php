<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PindahHalaman extends Controller
{
    public function PindahDashboard()
    {
        return view("adminlte.index");
    }

    public function pindahPengumuman()
    {
        return view("adminlte.FormPengumuman");
    }

    public function pindahSiswa()
    {
        $daftarSiswa = DB::select('select * from siswa');
        return view("adminlte.formSiswa",[
            "daftarSiswa"=>$daftarSiswa
        ]);
    }

    public function pindahGuru()
    {
        return view("adminlte.formGuru");
    }

    public function pindahKelas()
    {
        return view("adminlte.formKelas");
    }

    public function pindahMatPel()
    {
        return view("adminlte.formMatPel");
    }

    public function pindahJadwal()
    {
        return view("adminlte.jadwal");
    }

    public function pindahPerodAkademik()
    {
        $daftarPerodAkademik = DB::select('select * from periode_akademik');
        return view("adminlte.formPeriodeAkademik",[
            "daftarPerodAkademik"=>$daftarPerodAkademik
        ]);

    }

    public function pindahDBGuru()
    {
        return view("guru.index");
    }

    public function pindahInputNilai()
    {
       return view("guru.inputNilai");
    }
}
