<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Database extends Controller
{
    public function selectSiswa(Request $data)
    {
        
        if ($data->has("Save")) {
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
        return view("adminlte.formSiswa",[
            "daftarSiswa"=>$daftarSiswa
        ]);
    }
}
