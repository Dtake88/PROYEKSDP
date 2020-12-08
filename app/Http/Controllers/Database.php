<?php

namespace App\Http\Controllers;

use App\ajar_mengajar;
use App\guru;
use App\history_edit;
use App\Imports\SiswaImport;
use App\jurusan;
use App\kelas;
use App\mapel;
use App\pengumuman;
use App\periode_akademik;
use App\riwayat_akademik;
use App\siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class Database extends Controller
{
    public function updateSiswa(Request $request)
    {
        // dd($request->all());
        $siswa = siswa::find($request->NIS);
        $siswa->NISN = $request->NISN;
        $siswa->Nama_siswa = $request->nama;

        $siswa->Password_siswa = Hash::make( $request->password);
        // $siswa->Password_siswa = $request->password;
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
            "nisn" => "required|numeric",
            "nama" => "required",
            "pw" => "required",
            "tmptLahir" => "required|alpha",
            "tglLahir" => "required",
            "NameMom" => "required",
            "NameDad" => "required",
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
                    "Nama_ayah"=>$data->input("NameDad"),                    "Status"=>$data->input("status"),
                    "NISN"=>$data->input("nisn"),
                    "Agama"=>$data->input("agama"),
                    "Jenis_kelamin"=>$data->input("jk"),
                    "Alamat_siswa"=>$data->input("alamat"),
                    "Id_kelas" => $data->input("kelas"),
                    "Id_jurusan" =>$data->input("jurusan")
                ]
            );
            // dd("inserted");
            return redirect("/siswa");
        }
        if ($data->has("Update")) {
            $tempnis = siswa::find($data->input("nis"));
            $tempnis->Nama_siswa = $data->input("nama");
            $tempnis->Password_siswa =Hash::make($data->input("pw"));
            $tempnis->Tempat_lahir_siswa = $data->input("tmptLahir");
            $tempnis->Tanggal_lahir_siswa = $data->input("tglLahir");
            $tempnis->Nama_ibu = $data->input("NameMom");
            $tempnis->Nama_ayah = $data->input("NameDad");
            $tempnis->Alamat_siswa = $data->input("alamat");
            $tempnis->Agama = $data->input("agama");
            $tempnis->Jenis_kelamin = $data->input("jk");
            $tempnis->Status = $data->input("status");
            $tempnis->Id_kelas = $data->input("kelas");
            $tempnis->Id_jurusan = $data->input("jurusan");
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

    public function updateGuru(Request $request)
    {
        $guru = guru::find($request->NIG);
        $guru->Nama_guru = $request->nama;
        $guru->Password_guru = Hash::make( $request->password);
        $guru->No_hp_guru = $request->notelp;
        $guru->Alamat_guru = $request->alamat;
        $guru->Status_guru = $request->status;
        $guru->save();
        return redirect('/guru');
    }

    public function deleteGuru($id)
    {
        $guru = guru::find($id);
        $guru->delete();
        return redirect("/guru");
    }

    public function toUpdateGuru($id)
    {
        $guru  = guru::find($id);
        Session::put("guru",$guru);
        return view('adminlte.editGuru',["guru"=>$guru]);
    }

    public function selectGuru(Request $data)
    {
        $data->validate([
            "nama" => "required",
            "pw" => "required",
            "notelp" => "required",
            "alamat" => "required",
            "status" => "required"
        ]);

        // dd($data->all());
        if ($data->has("Insert")) {

            guru::create(
                [
                    "Nama_guru"=>$data->input("nama"),
                    "Password_guru"=>Hash::make($data->input("pw")),
                    "No_hp_guru"=>$data->input("notelp"),
                    "Alamat_guru"=>$data->input("alamat"),
                    "Status_guru"=>$data->input("status")
                ]
            );

            $guru = new guru;
            $guru->Nama_guru = $data->nama;
            $guru->Password_guru = Hash::make( $data->pw);
            $guru->No_hp_guru = $data->notelp;
            $guru->Alamat_guru = $data->alamat;
            $guru->Status_guru = $data->status;
            $guru->save();

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

    public function updatePeriode(Request $request)
    {
        $periode_akademik = periode_akademik::find($request->Id_periode);
        $periode_akademik->Tahun_ajaran = $request->Tahun_ajaran;
        $periode_akademik->Semester = $request->Semester;
        $periode_akademik->Status  = $request->Status;
        $periode_akademik->save();
        return redirect('/PeriodeAkademik');
    }

    public function deletePeriode($id)
    {
        $periode_akademik = periode_akademik::find($id);
        $periode_akademik->delete();
        return redirect("/PeriodeAkademik");
    }

    public function toUpdatePeriode($id)
    {
        $periode_akademik  = periode_akademik::find($id);
        Session::put("periode_akademik",$periode_akademik);
        return view('adminlte.editPeriode_akademik',["periode_akademik"=>$periode_akademik]);
    }

    public function selectPerodAkad(Request $data)
    {
        $data->validate([
            "TahunAjaran" => "required",
            "Semester" => "required",
            "Status" => "required"
        ]);
        if ($data->has("Insert")) {
            periode_akademik::create(
                [
                    "Tahun_ajaran"=>$data->input("TahunAjaran"),
                    "Semester"=>$data->input("Semester"),
                    "Status"=>$data->input("Status")
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

    public function updateMapel(Request $request)
    {
        $mapel = mapel::find($request->Id_mapel);
        $mapel->Nama_mapel = $request->Nama_mapel;
        $mapel->KKM = $request->KKM;
        $mapel->Tingkat  = $request->Tingkat;
        $mapel->save();
        return redirect('/MataPelajaran');
    }

    public function deleteMapel($id)
    {
        $mapel = mapel::find($id);
        $mapel->delete();
        return redirect("/MataPelajaran");
    }

    public function toUpdateMapel($id)
    {
        $mapel  = mapel::find($id);
        Session::put("mapel",$mapel);
        return view('adminlte.editMapel',["mapel"=>$mapel]);
    }

    public function selectMatPel(Request $data)
    {
        $data->validate([
            "nama" => "required",
            "kkm" => "required",
            "tingkat" => "required"
        ]);
        if ($data->has("Insert")) {
            mapel::create(
                [
                    "Nama_mapel"=>$data->input("nama"),
                    "KKM"=>$data->input("kkm"),
                    "Tingkat"=>$data->input("tingkat")
                ]
            );
        }
        if ($data->has("Update")) {
            mapel::where('Id_mapel','=',$data->input("id"))->update(
                [
                    "Nama_mapel"=>$data->input("nama"),
                    "KKM"=>$data->input("kkm"),
                    "Tingkat"=>$data->input("tingkat")
                ]
            );
        }
        if ($data->has("Delete")) {
            $valueDelete = $data->input("Delete");
            mapel::where('Id_mapel', '=' , $valueDelete)->delete();
        }
        $daftarMapel = mapel::all();
        return redirect("/MataPelajaran")->with('daftarMapel', $daftarMapel);
    }
    public function deleteRiwayat($id){
        $riwayat_akademik = riwayat_akademik::find($id);
        $riwayat_akademik->delete();
        return redirect("/riwayat");
    }
    public function updateRiwayat(Request $request){
        $riwayat_akademik = riwayat_akademik::find($request->Id_riwayat_akademik);
        $riwayat_akademik->Quiz1 = $request->Quiz1;
        $riwayat_akademik->Quiz2 = $request->Quiz2;
        $riwayat_akademik->Tugas1 = $request->Tugas1;
        $riwayat_akademik->Tugas2 = $request->Tugas2;
        $riwayat_akademik->UTS = $request->UTS;
        $riwayat_akademik->UAS = $request->UAS;
        $riwayat_akademik->Sikap = $request->Sikap;
        $riwayat_akademik->Hasil_akhir = $request->Hasil_akhir;
        $riwayat_akademik->save();
        return redirect('/riwayat');
    }
    public function toUpdateRiwayat($id)
    {
        $riwayat_akademik  = riwayat_akademik::find($id);
        Session::put("riwayat_akademik",$riwayat_akademik);
        return view('adminlte.editRiwayat',["riwayat_akademik"=>$riwayat_akademik]);
    }

    public function selectRiwayat(Request $data)
    {
        $data->validate([
            "siswa" => "required",
            "kelas" => "required",
            "mapel" => "required",
            "Quiz1" => "required",
            "Quiz2" => "required",
            "Tugas1" => "required",
            "Tugas2" => "required",
            "UTS" => "required",
            "UAS" => "required",
            "Sikap" => "required",
            "Nilai_akhir" => "required"
        ]);
        if ($data->has("Insert")) {
            riwayat_akademik::create(
                [
                    "NIS"=>$data->input("siswa"),
                    "Id_kelas"=>$data->input("kelas"),
                    "Id_mapel"=>$data->input("mapel"),
                    "Quiz1"=>$data->input("Quiz1"),
                    "Quiz2"=>$data->input("Quiz2"),
                    "Tugas1"=>$data->input("Tugas1"),
                    "Tugas2"=>$data->input("Tugas2"),
                    "UTS"=>$data->input("UTS"),
                    "UAS"=>$data->input("UAS"),
                    "Sikap"=>$data->input("Sikap"),
                    "Hasil_akhir"=>$data->input("Nilai_akhir")
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
        $daftarMapel = mapel::all();
        return redirect("/riwayat")->with('daftarMapel', $daftarMapel);
    }



    public function deleteKelas($id){
        $kelas = kelas::find($id);
        $kelas->delete();
        return redirect("/kelas");
    }
    public function updateKelas(Request $request){
        $kelas = kelas::find($request->Id_kelas);
        $kelas->Id_periode = $request->Id_periode;
        $kelas->NIG = $request->NIG;
        $kelas->Nama_kelas = $request->Nama_kelas;
        $kelas->Tingkat_kelas = $request->Tingkat_kelas;
        $kelas->Id_jurusan = $request->Id_jurusan;
        $kelas->save();
        return redirect('/kelas');
    }
    public function toUpdateKelas($id)
    {
        $kelas  = kelas::find($id);
        Session::put("kelas",$kelas);
        $optionperiode = periode_akademik::all();
        $optionguru = guru::all();
        $optionjurusan = jurusan::all();
        Session::put("optionperiode",$optionperiode);
        Session::put("optionguru",$optionguru);
        Session::put("optionjurusan",$optionjurusan);
        return view('adminlte.editKelas',[
            "kelas"=>$kelas
        ]);
    }
    public function selectKelas(Request $data)
    {

        $data->validate([
            "period" => "required",
            "nig" => "required",
            "nama" => "required",
            "tingkat" => "required",
            "idJur" => "required"
        ]);
        if ($data->has("Insert")) {
            kelas::create(
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

    public function deleteJadwal($id){
        $ajar_mengajar = ajar_mengajar::find($id);
        $ajar_mengajar->delete();
        return redirect("/Jadwal");
    }
    public function updateJadwal(Request $request){
        $ajar_mengajar = ajar_mengajar::find($request->Id_ajar_mengajar);
        $ajar_mengajar->Id_kelas = $request->Id_kelas;
        $ajar_mengajar->Id_mapel = $request->Id_mapel;
        $ajar_mengajar->NIG = $request->NIG;
        $ajar_mengajar->Jam_berakhir = $request->Jam_berakhir;
        $ajar_mengajar->Jam_dimulai = $request->Jam_dimulai;
        $ajar_mengajar->Hari = $request->Hari;
        $ajar_mengajar->Jam_belajar = $request->Jam_belajar;
        $ajar_mengajar->Status_jadwal = $request->Status_jadwal;
        $ajar_mengajar->save();
        return redirect('/Jadwal');
    }
    public function toUpdateJadwal($id)
    {
        $ajar_mengajar  = ajar_mengajar::find($id);
        Session::put("ajar_mengajar",$ajar_mengajar);
        $optionguru = guru::all();
        $optionkelas = kelas::all();
        $optionmapel = mapel::all();
        Session::put("optionguru",$optionguru);
        Session::put("optionkelas",$optionkelas);
        Session::put("optionmapel",$optionmapel);
        return view('adminlte.editJadwal',[
            "ajar_mengajar"=>$ajar_mengajar

        ]);
    }
    public function selectJadwal(Request $data)
    {
        dd($data->all());
        $data->validate([
            "Id_kelas" => "required",
            "Id_mapel" => "required",
            "NIG" => "required",
            "Hari" => "required",
            "Jam_dimulai" => "required",
            "Jam_berakhir" => "required",
            "Jam_belajar" => "required",
            "Status_jadwal" => "required"
        ]);
        if ($data->has("Insert")) {
            ajar_mengajar::create(
                [
                    "Id_kelas"=>$data->input("Id_kelas"),
                    "Id_mapel"=>$data->input("Id_mapel"),
                    "NIG"=>$data->input("NIG"),
                    "Jam_berakhir"=>$data->input("Jam_berakhir"),
                    "Jam_dimulai"=>$data->input("Jam_dimulai"),
                    "Hari"=>$data->input("Hari"),
                    "Jam_belajar"=>$data->input("Jam_belajar"),
                    "Status_jadwal"=>$data->input("Status_jadwal")
                ]
            );
        }
        return redirect("/Jadwal");
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

    public function downloadToa($namafile)
    {
        dd($namafile);
        return Storage::disk('local')->download("fileToa/".$namafile);
    }





    public function selectToa(Request $data)
    {
        // ascas
        $data->validate([
            "namaToa" => "required",
            "fileToa" => "required|mimes:pdf"
        ]);
        if ($data->session()->has("loggedAdmin")) {
            $penToa = $data->session()->get("loggedAdmin");
            $namafile = Str::random(8).".".$data->file("fileToa")->getClientOriginalExtension();
            $data->file("fileToa")->storeAs("fileToa",$namafile,"local");
            if ($data->has("Insert")) {
                pengumuman::insert(
                    [
                        "Judul_pengumuman"=>$data->input("namaToa"),
                        "Tanggal_pengumuman"=>new Carbon('now'),
                        "File_pengumuman"=>$namafile,
                        "Id_administrasi"=>$penToa
                    ]
                );
            }
        }
        return redirect("/pengumuman");
    }

    public function importSiswa(Request $data)
    {
        // validasi
		$this->validate($data, [
			'fileSiswa' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $data->file('fileSiswa');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);

		// import data
		Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));

		// alihkan halaman kembali
        return redirect('/siswa')->with('message','Format Benar');
    }
}
