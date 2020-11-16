<?php


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


Route::get('/jurusan', 'PindahHalaman@PindahJurusan');
Route::get('/biodata', 'PindahHalaman@PindahBiodata');
Route::get('/EditBiodata', 'PindahHalaman@EditBiodata');
Route::get('/nilaiSiswa', 'PindahHalaman@LihatNilai');
Route::get('/dashboardSiswa', 'PindahHalaman@PindahDashboardSiswa');



//admin
Route::group(['middleware' => ['AdminMiddleware']], function () {
    Route::get('/homeAdmin', 'AdminController@toHome');
    Route::get('/pengumuman', 'AdminController@pindahPengumuman');
    Route::get('/siswa', 'AdminController@pindahSiswa');
    Route::get('/guru', 'AdminController@pindahGuru');
    Route::get('/kelas', 'AdminController@pindahKelas');
    Route::get('/MataPelajaran', 'AdminController@pindahMatPel');
    Route::get('/Jadwal', 'AdminController@pindahJadwal');
    Route::get('/PeriodeAkademik', 'AdminController@pindahPerodAkademik');
});


//guru
Route::get('/homeGuru', 'GuruController@toHome');
Route::get('/inputNilai', 'GuruController@pindahInputNilai');


// post
Route::post('/OlahLogin', 'OlahData@OlahData');
Route::post('/siswa/crud', 'Database@selectSiswa');
Route::post('/guru/crud', 'Database@selectGuru');
Route::post('/mapel/crud', 'Database@selectMatPel');
Route::post('/perodAkad/crud', 'Database@selectPerodAkad');
Route::post('/toa/crud', 'Database@selectToa');
Route::post('/kelas/crud', 'Database@selectKelas');
