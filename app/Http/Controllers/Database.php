<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Database extends Controller
{
    public function selectSiswa(Request $data)
    {
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            DB::table('siswa')->where('NIS', '=' , $valueDelete)->delete();
        }

        if ($data->has("Update")) {
                DB::table('siswa')->where('NIS', '=' , $data->input("nis"))->update([
                    "Nama_siswa"=>$data->input("nama"),
                    "Password_siswa"=>$data->input("pw"),
                    "Tempat_lahir_siswa"=>$data->input("tmptLahir"),
                    "Tanggal_lahir_siswa"=>$data->input("tglLahir"),
                    "Nama_ibu"=>$data->input("NameMom"),
                    "Nama_ayah"=>$data->input("NameDad"),
                    "Alamat_siswa"=>$data->input("alamat"),
                    "Agama"=>$data->input("agama"),
                    "Jenis_kelamin"=>$data->input("jk"),
                    "Status"=>$data->input("status")
                ]);
        }
        if ($data->has("Insert")) {
            DB::table('siswa')->insert(
                [
                    "Nama_siswa"=>$data->input("nama"),
                    "Password_siswa"=>$data->input("pw"),
                    "Tempat_lahir_siswa"=>$data->input("tmptLahir"),
                    "Tanggal_lahir_siswa"=>$data->input("tglLahir"),
                    "Nama_ibu"=>$data->input("NameMom"),
                    "Nama_ayah"=>$data->input("NameDad"),
                    "Status"=>$data->input("status"),
                    "NISN"=>$data->input("nisn"),
                    "Agama"=>$data->input("agama"),
                    "Jenis_kelamin"=>$data->input("jk"),
                    "Alamat_siswa"=>$data->input("alamat")
                ]
            );
        }

        $daftarSiswa = DB::select('select * from siswa');
        return redirect("/siswa")->with('daftarsiswa', $daftarSiswa);
    }

    public function selectGuru(Request $data)
    {
        if ($data->has("Insert")) {
            DB::table('guru')->insert(
                [
                    "Nama_guru"=>$data->input("nama"),
                    "Password_guru"=>$data->input("pw"),
                    "No_hp_guru"=>$data->input("notelp"),
                    "Alamat_guru"=>$data->input("alamat"),
                    "Status_guru"=>$data->input("status")
                ]
            );
        }

        if ($data->has("Update")) {
            DB::table('guru')->where('NIG','=',$data->input("nig"))->update(
                [
                    "Nama_guru"=>$data->input("nama"),
                    "Password_guru"=>$data->input("pw"),
                    "No_hp_guru"=>$data->input("notelp"),
                    "Alamat_guru"=>$data->input("alamat"),
                    "Status_guru"=>$data->input("status")
                ]
            );
        }

        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            DB::table('guru')->where('NIG', '=' , $valueDelete)->delete();
        }
        $daftarGuru = DB::select('select * from guru');
        return redirect("/guru")->with('daftarGuru', $daftarGuru);
    }

    public function selectPerodAkad(Request $data)
    {
        if ($data->has("Insert")) {
            DB::table('periode_akademik')->insert(
                [
                    "Id_periode"=>$data->input("id"),
                    "Tahun_ajaran"=>$data->input("TahunAjaran"),
                    "Semester"=>$data->input("Semester"),
                    "Status"=>$data->input("status")
                ]
            );
        }

        if ($data->has("Update")) {
            DB::table('periode_akademik')->where('Id_periode','=',$data->input("id"))->update(
                [
                    "Id_periode"=>$data->input("id"),
                    "Tahun_ajaran"=>$data->input("TahunAjaran"),
                    "Semester"=>$data->input("Semester"),
                    "Status"=>$data->input("status")
                ]
            );
        }

        $daftarPerod = DB::select('select * from periode_akademik');
        return redirect("/PeriodeAkademik")->with('daftarPerod', $daftarPerod);
    }

    public function selectMatPel(Request $data)
    {
        if ($data->has("Insert")) {
            DB::table('mapel')->insert(
                [
                    "Nama_mapel"=>$data->input("nama"),
                    "KKM"=>$data->input("kkm"),
                    "Tingkat"=>$data->input("tingkat")
                ]
            );
        }
        if ($data->has("Update")) {
            DB::table('mapel')->where('Id_mapel','=',$data->input("id"))->update(
                [
                    "Nama_mapel"=>$data->input("nama"),
                    "KKM"=>$data->input("kkm"),
                    "Tingkat"=>$data->input("tingkat")
                ]
            );
        }
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            DB::table('mapel')->where('Id_mapel', '=' , $valueDelete)->delete();
        }
        $daftarMapel = DB::select('select * from mapel');
        return redirect("/MataPelajaran")->with('daftarMapel', $daftarMapel);
    }

    public function selectToa(Request $data)
    {
        // dd($data->input("fileToa"));
        if ($data->has("Insert")) {
            DB::table('pengumuman')->insert(
                [
                    "Judul_pengumuman"=>$data->input("namaToa"),
                    "File_pengumuman"=>$data->input("fileToa"),
                    "Id_administrasi"=>$data->input("penToa")
                ]
            );
        }
        if ($data->has("Update")) {
            DB::table('pengumuman')->where('Id_pengumuman','=',$data->input("id"))->update(
                [
                    "Judul_pengumuman"=>$data->input("namaToa"),
                    "Tanggal_pengumuman"=>$data->input("tglToa"),
                    "File_pengumuman"=>$data->input("fileToa"),
                    "Id_administrasi"=>$data->input("penToa")
                ]
            );
        }
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            DB::table('pengumuman')->where('Id_pengumuman', '=' , $valueDelete)->delete();
        }
        return redirect("/pengumuman");
    }

    public function selectKelas(Request $data)
    {
        if ($data->has("Insert")) {
            DB::table('kelas')->insert(
                [
                    "Id_periode"=>$data->input("period"),
                    "NIG"=>$data->input("nig"),
                    "Nama_kelas"=>$data->input("nama"),
                    "Tingkat_kelas"=>$data->input("tingkat"),
                    "Id_jurusan"=>$data->input("idJur")
                ]
            );
        }
        if ($data->has("Update")) {
            DB::table('kelas')->where('Id_kelas','=',$data->input("id"))->update(
                [
                    "Id_periode"=>$data->input("period"),
                    "NIG"=>$data->input("nig"),
                    "Nama_kelas"=>$data->input("nama"),
                    "Tingkat_kelas"=>$data->input("tingkat"),
                    "Id_jurusan"=>$data->input("idJur")
                ]
            );
        }
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            DB::table('kelas')->where('Id_kelas', '=' , $valueDelete)->delete();
        }
        return redirect("/kelas");
    }
}
