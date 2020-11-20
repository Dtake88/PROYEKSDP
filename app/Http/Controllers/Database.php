<?php

namespace App\Http\Controllers;

use App\guru;
use App\history_edit;
use App\periode_akademik;
use App\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Database extends Controller
{
    public function updateSiswa(Request $request)
    {
        // dd($request->all());
        $siswa = siswa::find($request->NIS);
        $siswa->NISN = $request->NISN;
        $siswa->Nama_siswa = $request->nama;
        $siswa->Password_siswa = $request->password;
        $siswa->Tempat_lahir_siswa = $request->tempatLahir;
        $siswa->Tanggal_lahir_siswa = $request->tanggalLahir;
        $siswa->Nama_ibu = $request->namaIbu;
        $siswa->Nama_ayah = $request->namaAyah;
        $siswa->agama = $request->agama;
        $siswa->Jenis_kelamin = $request->jenisKelamin;
        $siswa->Alamat_Siswa = $request->alamat;
        $siswa->save();
        return redirect('/siswa');
    }

    public function deleteSiswa($id)
    {
        $siswa = siswa::find($id);
        $siswa->delete();
        return redirect("/siswa");
    }

    public function toUpdateSiswa($id)
    {
        $siswa  = siswa::find($id);
        Session::put("siswa",$siswa);
        return view('adminlte.editSiswa',["siswa"=>$siswa]);
    }


    public function selectSiswa(Request $data)
    {
        $data->validate([
            "nama" => "required|alpha",
            "pw" => "required",
            "tmptLahir" => "required|alpha",
            "tglLahir" => "required|date",
            "NameMom" => "required|alpha",
            "NameDad" => "required|alpha",
            "status" => "required",
            "nisn" => "required|numeric|size:10|unique:connection.siswa, NISN",
            "agama" => "required|alpha",
            "jk" => "required|alpha",
            "alamat" => "required"
        ]);
        if ($data->has("Insert")) {
            siswa::create(
                [
                    "Nama_siswa"=>$data->input("nama"),
                    "Password_siswa"=>Hash::make( $data->input("pw")),
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
        if ($data->has("Update")) {
            $tempnis = siswa::find($data->input("nis"));
            $tempnis->Nama_siswa = $data->input("nama");
            $tempnis->Password_siswa =Hash::make($data->input("pw")) ;
            $tempnis->Tempat_lahir_siswa = $data->input("tmptLahir");
            $tempnis->Tanggal_lahir_siswa = $data->input("tglLahir");
            $tempnis->Nama_ibu = $data->input("NameMom");
            $tempnis->Nama_ayah = $data->input("NameDad");
            $tempnis->Alamat_siswa = $data->input("alamat");
            $tempnis->Agama = $data->input("agama");
            $tempnis->Jenis_kelamin = $data->input("jk");
            $tempnis->Status = $data->input("status");
            $tempnis->save();
        }
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            siswa::where('NIS', '=' , $valueDelete)->delete();
        }
        $daftarSiswa = siswa::all();
        foreach($daftarSiswa as $siswas){
            $siswas->Password_siswa = Hash::make($siswas->Password_siswa);
        }
        return redirect("/siswa")->with('daftarsiswa', $daftarSiswa);
    }

    public function selectGuru(Request $data)
    {
        $data->validate([
            "nama" => "required|alpha",
            "pw" => "required",
            "notelp" => "required|numeric|size:12|unique:connection.guru, No_guru",
            "alamat" => "required",
            "status" => "required"
        ]);

        if ($data->has("Insert")) {
            guru::create(
                [
                    "Nama_guru"=>$data->input("nama"),
                    "Password_guru"=>Hash::make($data->input("pw")),
                    "No_guru"=>$data->input("notelp"),
                    "Alamat_guru"=>$data->input("alamat"),
                    "Status_guru"=>$data->input("status")
                ]
            );
        }
        if ($data->has("Update")) {
            $tempnig = guru::find($data->input("nig"));
            $tempnig->Nama_guru = $data->input("nama");
            $tempnig->Password_guru = Hash::make($data->input("pw"));
            $tempnig->No_guru = $data->input("notelp");
            $tempnig->Alamat_guru = $data->input("alamat");
            $tempnig->Status_guru = $data->input("status");
            $tempnig->save();
        }
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            guru::where('NIG', '=', $valueDelete)->delete();
        }
        $daftarGuru = guru::all();
        $daftarGuru = siswa::all();
        foreach($daftarGuru as $gurus){
            $gurus->Password_guru = Hash::make($gurus->Password_guru);
        }
        return redirect("/guru")->with('daftarGuru', $daftarGuru);
    }

    public function selectPerodAkad(Request $data)
    {
        $data->validate([
            "Id_periode" => "required|alpha",
            "TahunAjaran" => "required|size:1",
            "Semester" => "required|numeric|size:1",
            "Status" => "required"
        ]);
        if ($data->has("Insert")) {
            periode_akademik::create(
                [
                    "Id_periode"=>$data->input("id"),
                    "Tahun_ajaran"=>$data->input("TahunAjaran"),
                    "Semester"=>$data->input("Semester"),
                    "Status"=>$data->input("status")
                ]
            );
        }


        if ($data->has("Update")) {
            $tempid_periode = periode_akademik::find($data->input("id"));
            ////////////////////////////////////////////////////////////////////////
            $tempid_periode->Id_periode = $data->input("id");
            $tempid_periode->Tahun_ajaran = $data->input("TahunAjaran");
            $tempid_periode->Semester = $data->input("Semester");
            $tempid_periode->Status = $data->input("status");
            $tempid_periode->save();
        }

        $daftarPerod = periode_akademik::all();
        return redirect("/PeriodeAkademik")->with('daftarPerod', $daftarPerod);
    }

    public function selectMatPel(Request $data)
    {
        $data->validate([
            "Nama_mapel" => "required|alpha",
            "KKM" => "required|numeric|size:3",
            "Tingkat" => "required|numeric|size:1"
        ]);
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
        // ascas
        $data->validate([
            "Judul_pengumuman" => "required",
            "File_pengumuman" => "required"
        ]);
        // dd($data->input("fileToa"));
        if ($data->has("Insert")) {
            DB::table('pengumuman')->insert(
                [
                    "Judul_pengumuman"=>$data->input("namaToa"),
                    "Tanggal_pengumuman"=>CarbonCarbon::now()->format('YYYY-MM-DD'),
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
        $data->validate([
            "period" => "required",
            "nig" => "required",
            "nama" => "required|alpha",
            "tingkat" => "required|max:1|numeric",
            "idJur" => "required"
        ]);
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

    ///////////////////////////////////////////tambahan
    public function selectHistoryEdit(Request $data)
    {
        $data->validate([
            "Id_table" => "required|numeric|size:6",
            "Id_pengedit" => "required|numeric|size:6"
        ]);
        if ($data->has("Insert")) {
            history_edit::create(
                [
                    "Id_table"=>$data->input(""),
                    "Id_pengedit"=>$data->input(""),
                    "Tanggal_edit"=>$data->input("")
                ]
            );
        }
        if ($data->has("Update")) {
            $tempid_history_edit = history_edit::find($data->input(""));
            $tempid_history_edit->Id_table = $data->input("");
            $tempid_history_edit->Id_pengedit = $data->input("");
            $tempid_history_edit->Tanggal_edit = $data->input("");
            $tempid_history_edit->save();
        }
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            history_edit::where('Id_history_edit','=',$valueDelete)->delete();
        }
        return redirect("/");
    }
}
