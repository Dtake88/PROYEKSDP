<?php

namespace App\Http\Controllers;

use App\ajar_mengajar;
use App\guru;
use App\jurusan;
use App\kelas;
use App\mapel;
use App\pengumuman;
use App\periode_akademik;
use App\siswa;
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
        $daftarToa = pengumuman::all();
        return view("adminlte.FormPengumuman",[
            "daftarToa"=>$daftarToa
        ]);
    }

    public function pindahSiswa()
    {
        $daftarSiswa = siswa::all();
        return view("adminlte.formSiswa",[
            "daftarSiswa"=>$daftarSiswa
        ]);
    }

    public function pindahGuru()
    {
        $daftarGuru = guru::all();
        return view("adminlte.formGuru",[
            "daftarGuru"=>$daftarGuru
        ]);
    }

    public function pindahKelas()
    {
        // $daftarKelas = DB::table('kelas')->get();
        // $DBPeriode = DB::table('periode_akademik')->where("Status", 1)->get();
        // $GuruAktif = DB::table('guru')->where("Status_guru",1)->get();
        // $DBJurusan = DB::table('jurusan')->get();
        $daftarKelas = kelas::all();
        $DBPeriode = periode_akademik::where("status",1);
        $GuruAktif = guru::where("Status_guru",1)->get();
        $DBJurusan = jurusan::all();


        // dd($daftarKelas[0]->jurusan);
        return view("adminlte.formKelas",[
            "daftarKelas"=>$daftarKelas,
            "periode"=>$DBPeriode,
            "Guru"=>$GuruAktif,
            "jurusan"=>$DBJurusan
        ]);
    }

    public function pindahMatPel()
    {
        $daftarMatPel = mapel::all();
        return view("adminlte.formMatPel",[
            "daftarMatPel"=>$daftarMatPel
        ]);
    }

    public function pindahJadwal()
    {
        // $DBJadwal = DB::table('ajar_mengajar')->get();
        // $GuruAktif = DB::table('guru')->where("Status_guru",1)->get();
        // $Mapel = DB::table("mapel")->get();
        // $kelas = DB::table('kelas')->get();

        $DBJadwal = ajar_mengajar::all();
        $GuruAktif = guru::where("Status_guru",1)->get();
        $Mapel = mapel::all();
        $kelas = kelas::all();

        return view("adminlte.jadwal",["Jadwal"=>$DBJadwal, "Guru"=>$GuruAktif,"Mapel"=>$Mapel,"kelas"=>$kelas]);
    }

    public function pindahPerodAkademik()
    {
        $daftarPerodAkademik = periode_akademik::all();
        return view("adminlte.formPeriodeAkademik",[
            "daftarPerodAkademik"=>$daftarPerodAkademik
        ]);

    }
}
