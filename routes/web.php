<?php

use App\guru;
use App\riwayat_akademik;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    return redirect("/");
});


//admin
Route::group(['middleware' => ['AdminMiddleware']], function () {
    Route::get('/homeAdmin', 'AdminController@toHome');
    Route::get('/pengumuman', 'AdminController@pindahPengumuman');
    Route::get('/siswa', 'AdminController@pindahSiswa');
    Route::get('/guru', 'AdminController@pindahGuru');
    Route::get('/PeriodeAkademik', 'AdminController@pindahPerodAkademik');
    Route::get('/kelas', 'AdminController@pindahKelas');
    Route::get('/MataPelajaran', 'AdminController@pindahMatPel');
    Route::get('/Jadwal', 'AdminController@pindahJadwal');
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





// post
Route::post('/OlahLogin', 'OlahData@OlahData');
Route::post('/siswa/crud', 'Database@selectSiswa');
Route::post('/guru/crud', 'Database@selectGuru');
Route::post('/mapel/crud', 'Database@selectMatPel');
Route::post('/perodAkad/crud', 'Database@selectPerodAkad');
Route::post('/toa/crud', 'Database@selectToa');
Route::post('/kelas/crud', 'Database@selectKelas');


Route::get('tes', function () {
    // $v = riwayat_akademik::all();
    $sessionGuru = Session::get("loggedGuru");
    $guru = guru::find($sessionGuru['username']);
    dd($guru->mapel);

});
