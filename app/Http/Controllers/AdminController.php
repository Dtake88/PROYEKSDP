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

    public function PindahSiswaAktif()
    {
        $DBsiswa=siswa::where('status', 1)->get();
        return view("adminlte.formSiswaAktif",[
            "DBsiswa"=>$DBsiswa
        ]);

    }

    public function NaikKelas(Request $data)
    {
        $DBsiswa=siswa::where('status', 1)->get();
        $countDBsiswa = siswa::where('status', 1)->count();
        $periodeAktif = periode_akademik::select('Id_periode')->where('Status',1)->where('Semester',2)->get();

        for ($i=0; $i <$countDBsiswa ; $i++) {
            $kelasSiswa = kelas::select('Id_kelas')
                    ->where('Id_kelas',$DBsiswa[$i]->Id_kelas)
                    ->whereIn('Id_periode',$periodeAktif[0])->get();
            $riwayatSiswa=riwayat_akademik::where('NIS', $DBsiswa[$i]->NIS)
                    ->where('Id_kelas',$kelasSiswa[0]->Id_kelas)->get();
            $countRiwayat = riwayat_akademik::where('NIS', $DBsiswa[$i]->NIS)
                    ->where('Id_kelas',$kelasSiswa[0]->Id_kelas)->count();
            $countKKM=0;
            for ($j=0; $j < $countRiwayat ; $j++) {
                $countKKM = $countKKM +mapel::where('KKM','>=',$riwayatSiswa[$j]->Hasil_akhir)
                            ->where('Id_mapel',$riwayatSiswa[$j]->Id_mapel)->count();
            }

            echo($kelasSiswa[0]->Id_kelas);
            echo("<br>");
            echo($DBsiswa[$i]->NIS . " - " . $DBsiswa[$i]->Nama_siswa . " - kelas:" .
            $DBsiswa[$i]->Id_kelas. " -  gk lulus:" . $countKKM . " - Tingkat : " . $DBsiswa[$i]->kelas->Tingkat_kelas);
            echo("<br>");
        }
        // dd($DBsiswa);


        // dd($kelasSiswa[0]);
        // $riwayatSiswa=riwayat_akademik::whereIn('NIS', $DBsiswa->NIS)
        //             ->where('Id_kelas',$kelasSiswa[0]->Id_kelas)->get();
        // // dd($riwayatSiswa);
        // $countRiwayat = riwayat_akademik::whereIn('NIS', $DBsiswa->NIS)
        // ->where('Id_kelas',$kelasSiswa[0]->Id_kelas)->count();

        // $countRiwayat = riwayat_akademik::whereIn('NIS', $DBsiswa->NIS)
        // ->where('Id_kelas',$kelasSiswa[0]->Id_kelas)->count();


        // return view('adminlte.coba',[
        //     'DBsiswa'=>$DBsiswa
        // ]);
    }
}
