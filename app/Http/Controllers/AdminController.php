<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function toHome(Request $request)
    {
        return view("adminlte.index");

    }

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
        $daftarKelas = DB::table('kelas')->get();
        $DBPeriode = DB::table('periode_akademik')->where("Status", 1)->get();
        $GuruAktif = DB::table('guru')->where("Status_guru",1)->get();
        $DBJurusan = DB::table('jurusan')->get();
        return view("adminlte.formKelas",[
            "daftarKelas"=>$daftarKelas,
            "periode"=>$DBPeriode,
            "Guru"=>$GuruAktif,
            "jurusan"=>$DBJurusan
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
        $DBJadwal = DB::table('ajar_mengajar')->get();
        $GuruAktif = DB::table('guru')->where("Status_guru",1)->get();
        $Mapel = DB::table("mapel")->get();
        $kelas = DB::table('kelas')->get();
        return view("adminlte.jadwal",["Jadwal"=>$DBJadwal, "Guru"=>$GuruAktif,"Mapel"=>$Mapel,"kelas"=>$kelas]);
    }

    public function pindahPerodAkademik()
    {
        $daftarPerodAkademik = DB::select('select * from periode_akademik');
        return view("adminlte.formPeriodeAkademik",[
            "daftarPerodAkademik"=>$daftarPerodAkademik
        ]);

    }
}
