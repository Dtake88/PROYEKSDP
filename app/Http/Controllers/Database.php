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
            DB::table('siswa')->where('ID_SISWA', '=' , $valueDelete)->delete();
        }

        if ($data->has("Update")) {
                DB::table('siswa')->where('ID_SISWA', '=' , $data->input("id"))->update([
                "NIS"=>$data->input("nis"),
                "NISN"=>$data->input("nisn"),
                "NAMA_SISWA"=>$data->input("nama"),
                "PASSWORD"=>$data->input("pw"),
                "ALAMAT_SISWA"=>$data->input("alamat"),
                "AGAMA_SISWA"=>$data->input("agama"),
                "EMAIL_SISWA"=>$data->input("email"),
                "JENIS_KELAMIN"=>$data->input("jk"),
                "NO_HP_SISWA"=>$data->input("notelp"),
                "TANGGAL_LAHIR"=>$data->input("tglLahir"),
                "STATUS"=>$data->input("status")
                ]);
        }

        if ($data->has("Insert")) {
            DB::table('siswa')->insert(
                [
                    "ID_SISWA"=>$data->input("id"),
                    "NIS"=>$data->input("nis"),
                    "NISN"=>$data->input("nisn"),
                    "NAMA_SISWA"=>$data->input("nama"),
                    "PASSWORD"=>$data->input("pw"),
                    "ALAMAT_SISWA"=>$data->input("alamat"),
                    "AGAMA_SISWA"=>$data->input("agama"),
                    "EMAIL_SISWA"=>$data->input("email"),
                    "JENIS_KELAMIN"=>$data->input("jk"),
                    "NO_HP_SISWA"=>$data->input("notelp"),
                    "TANGGAL_LAHIR"=>$data->input("tglLahir"),
                    "STATUS"=>$data->input("status")
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
                    "ID_GURU"=>$data->input("id"),
                    "NIG"=>$data->input("nig"),
                    "NAMA_GURU"=>$data->input("nama"),
                    "PASSWORD_GURU"=>$data->input("pw"),
                    "NO_HP_GURU"=>$data->input("notelp"),
                    "ALAMAT_GURU"=>$data->input("alamat"),
                    "STATUS_GURU"=>$data->input("status")
                ]
            );
        }
        if ($data->has("Update")) {
            DB::table('guru')->where('ID_GURU','=',$data->input("id"))->update(
                [
                    "ID_GURU"=>$data->input("id"),
                    "NIG"=>$data->input("nig"),
                    "NAMA_GURU"=>$data->input("nama"),
                    "PASSWORD_GURU"=>$data->input("pw"),
                    "NO_HP_GURU"=>$data->input("notelp"),
                    "ALAMAT_GURU"=>$data->input("alamat"),
                    "STATUS_GURU"=>$data->input("status")
                ]
            );
        }
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            DB::table('guru')->where('ID_GURU', '=' , $valueDelete)->delete();
        }
        $daftarGuru = DB::select('select * from guru');
        return redirect("/guru")->with('daftarGuru', $daftarGuru);
    }
}
