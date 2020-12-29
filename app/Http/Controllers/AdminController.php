<?php

namespace App\Http\Controllers;

use App\ajar_mengajar;
use App\guru;
use App\jurusan;
use App\kelas;
use App\mapel;
use App\pengumuman;
use App\periode_akademik;
use App\riwayat_akademik;
use App\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function toHome(Request $request)
    {
        $pengumuman = pengumuman::all();

        return view("adminlte.index" , [
            "pengumuman"=>$pengumuman,
            // "fileToa"=>$myPenting
            ]);
    }

    public function PindahDashboard()
    {
        $pengumuman = pengumuman::all();
        return view("adminlte.index" , ["pengumuman"=>$pengumuman]);
    }

    public function pindahPengumuman(Request $data)
    {
        // $sessionAdmin= Auth::guard('admin');

        // dd($sessionAdmin);

        // $penToa = $data->session()->get("loggedAdmin");
        // dd($penToa);
        $daftarToa = pengumuman::all();
        return view("adminlte.FormPengumuman",[
            "daftarToa"=>$daftarToa
        ]);
    }

    public function pindahSiswa()
    {
        $daftarSiswa = siswa::all();
        $DBkelas = kelas::all();
        $DBJurusan = jurusan::all();
        return view("adminlte.formSiswa",[
            "daftarSiswa"=>$daftarSiswa,
            "DBkelas"=>$DBkelas,
            "DBJurusan"=>$DBJurusan
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
        $daftarKelas = kelas::all();
        $DBPeriode = periode_akademik::where("Status",1)->get();
        $GuruAktif = guru::where("Status_guru",1)->get();
        $DBJurusan = jurusan::all();
        return view("adminlte.formKelas",[
            "daftarKelas"=>$daftarKelas,
            "DBPeriode"=>$DBPeriode,
            "Guru"=>$GuruAktif,
            "jurusan"=>$DBJurusan
        ]);
    }

    public function pindahMatPel()
    {
        $daftarMatPel = mapel::all();
        $DBJurusan = jurusan::all();
        return view("adminlte.formMatPel",[
            "daftarMatPel"=>$daftarMatPel,
            "jurusan"=>$DBJurusan
        ]);
    }

    public function pindahRiwayat()
    {
        $DBriwayat = riwayat_akademik::all();
        $DBsiswa = siswa::all();
        $DBkelas = kelas::all();
        $DBmapel = mapel::all();
        $DBAjar_mengajar = ajar_mengajar::all();
        return view("adminlte.formRiwayat",[
            "DBAjar_mengajar"=>$DBAjar_mengajar,
            "DBriwayat"=>$DBriwayat,
            "DBsiswa"=>$DBsiswa,
            "DBkelas"=>$DBkelas,
            "DBmapel"=>$DBmapel
        ]);
    }



    public function pindahJadwal()
    {
        $DBJadwal = ajar_mengajar::all();
        $GuruAktif = guru::where("Status_guru",1)->get();
        $Mapel = mapel::all();
        $kelas = kelas::all();
        return view("adminlte.jadwal",[
            "Jadwal"=>$DBJadwal,
            "Guru"=>$GuruAktif,
            "Mapel"=>$Mapel,
            "kelas"=>$kelas]);
    }

    public function pindahPerodAkademik()
    {
        $daftarPerodAkademik = periode_akademik::all();
        return view("adminlte.formPeriodeAkademik",[
            "daftarPerodAkademik"=>$daftarPerodAkademik
        ]);

    }
}
