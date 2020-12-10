<?php

use App\ajar_mengajar;
use App\guru;
use App\jurusan;
use App\kelas;
use App\riwayat_akademik;
use App\siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Faker\Generator as Faker;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//get
Route::get('/', function () {
    return view('adminlte.login');
});
Route::get('/logout', function () {
    Session::flush();
    if(Auth::guard("admin")->check()){
        Auth::web("admin")->logout();
    }
    if(Auth::guard("guru")->check()){
        Auth::web("guru")->logout();
    }
    if(Auth::guard("siswa")->check()){
        Auth::web("siswa")->logout();
    }

    return redirect("/");
});

Route::get('/restore', function () {

    dd(siswa::onlyTrashed()->restore());
    // return view('adminlte.login');
});

//admin
Route::group(['middleware' => ['AdminMiddleware']], function () {
    Route::get('/homeAdmin', 'AdminController@toHome');
    Route::get('/pengumuman', 'AdminController@pindahPengumuman');
    Route::get('/siswa', 'AdminController@pindahSiswa');
    Route::get('/guru', 'AdminController@pindahGuru');
    Route::get('/PeriodeAkademik', 'AdminController@pindahPerodAkademik');
    Route::get('/AjarMengajar', 'AdminController@pindahJadwal');
    Route::get('/kelas', 'AdminController@pindahKelas');
    Route::get('/MataPelajaran', 'AdminController@pindahMatPel');
    Route::get('/riwayat', 'AdminController@pindahRiwayat');
    // Route::get('/Jadwal', 'AdminController@pindahJadwal');


    Route::get('/deleteSiswa/{id}', 'Database@deleteSiswa');
    Route::get('/toUpdateSiswa/{id}', 'Database@toUpdateSiswa');
    Route::post('/updateSiswa', 'Database@updateSiswa');
    Route::post('/filterSiswa', 'Database@filterSiswa');

    Route::get('/deleteGuru/{id}', 'Database@deleteGuru');
    Route::get('/toUpdateGuru/{id}', 'Database@toUpdateGuru');
    Route::post('/updateGuru', 'Database@updateGuru');

    Route::get('/deletePeriode/{id}', 'Database@deletePeriode');
    Route::get('/toUpdatePeriode/{id}', 'Database@toUpdatePeriode');
    Route::post('/updatePeriode', 'Database@updatePeriode');

    Route::get('/deleteMapel/{id}', 'Database@deleteMapel');
    Route::get('/toUpdateMapel/{id}', 'Database@toUpdateMapel');
    Route::post('/updateMapel', 'Database@updateMapel');

    Route::get('/deleteRiwayat/{id}', 'Database@deleteRiwayat');
    Route::get('/toUpdateRiwayat/{id}', 'Database@toUpdateRiwayat');
    Route::post('/updateRiwayat', 'Database@updateRiwayat');

    Route::get('/deleteKelas/{id}', 'Database@deleteKelas');
    Route::get('/toUpdateKelas/{id}', 'Database@toUpdateKelas');
    Route::post('/updateKelas', 'Database@updateKelas');

    Route::get('/deleteJadwal/{id}', 'Database@deleteJadwal');
    Route::get('/toUpdateJadwal/{id}', 'Database@toUpdateJadwal');
    Route::post('/updateJadwal', 'Database@updateJadwal');

    Route::get('/aktifNonaktifSiswa/{id}', function($id){
        $siswa = siswa::find($id);
        if($siswa->Status == 1){
            $siswa->Status = 0;}
        else{
        $siswa->Status = 1;
        }
        $siswa->save();
        return redirect("/siswa");
    });





});


//guru
Route::group(['middleware' => ['GuruMiddleware']], function () {
    Route::get('/homeGuru', 'GuruController@toHome');
    Route::get('/inputNilai', 'GuruController@pindahInputNilai');
    Route::get('/getDaftarNilai',"GuruController@getDaftarNilai" );
});


//siswa
Route::group(['middleware' => ["SiswaMiddleware"]], function () {
    Route::get('/jurusan', 'SiswaController@PindahJurusan');
    Route::get('/biodata', 'SiswaController@PindahBiodata');
    Route::get('/EditBiodata', 'SiswaController@EditBiodata');
    Route::get('/nilaiSiswa', 'SiswaController@LihatNilai');
    Route::get('/dashboardSiswa', 'SiswaController@PindahDashboardSiswa');
});


//download
Route::get('download/{namafile}', 'Database@downloadToa');
Route::get('GetFormatSiswa', 'SiswaController@downloadFormatSiswa');


// post
Route::post('/OlahLogin', 'OlahData@OlahData');
Route::post('/siswa/crud', 'Database@selectSiswa');
Route::post('/guru/crud', 'Database@selectGuru');
Route::post('/mapel/crud', 'Database@selectMatPel');
Route::post('/perodAkad/crud', 'Database@selectPerodAkad');
Route::post('/riwayat/crud', 'Database@selectRiwayat');
Route::post('/toa/crud', 'Database@selectToa');
Route::post('/kelas/crud', 'Database@selectKelas');
Route::post('/siswa/import', 'Database@importSiswa');
Route::post('/jadwal/crud', 'Database@selectJadwal');


Route::get('/tes', function (Faker $faker) {
    // $v = riwayat_akademik::all();
    // $sessionGuru = Session::get("loggedGuru");
    // $guru = guru::find($sessionGuru['username']);
    // dd($guru->mapel);
    // $siswa = siswa::latest("NIS")->first();
    // dd(siswa::latest("NIS")->first()->NIS+1);

    // dd($faker->address());
    factory(ajar_mengajar::class,10)->create();
    factory(riwayat_akademik::class,100)->create();
    echo"asd";

});
