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
        $daftarToa = DB::select('select * from pengumuman');
        return view("adminlte.FormPengumuman",[
            "daftarToa"=>$daftarToa
        ]);
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
        $daftarGuru = DB::select('select * from guru');
        return view("adminlte.formGuru",[
            "daftarGuru"=>$daftarGuru
        ]);
    }

    public function pindahKelas()
    {
        $daftarKelas = DB::select('select * from kelas');
        return view("adminlte.formKelas",[
            "daftarKelas"=>$daftarKelas
        ]);
    }

    public function pindahMatPel()
    {
        $daftarMatPel = DB::select('select * from mapel');
        return view("adminlte.formMatPel",[
            "daftarMatPel"=>$daftarMatPel
        ]);
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
