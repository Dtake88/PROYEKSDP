<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/pengumuman', 'PindahHalaman@pindahPengumuman');
Route::get('/dashboard', 'PindahHalaman@PindahDashboard');
Route::get('/siswa', 'PindahHalaman@pindahSiswa');
Route::get('/guru', 'PindahHalaman@pindahGuru');
Route::get('/kelas', 'PindahHalaman@pindahKelas');
Route::get('/MataPelajaran', 'PindahHalaman@pindahMatPel');
Route::get('/Jadwal', 'PindahHalaman@pindahJadwal');
Route::get('/PeriodeAkademik', 'PindahHalaman@pindahPerodAkademik');
Route::get('dashboardGuru', 'PindahHalaman@pindahDBGuru');
Route::get('/inputNilai', 'PindahHalaman@pindahInputNilai');

// post
Route::post('/OlahLogin', 'OlahData@OlahData');
Route::post('/siswa/crud', 'Database@selectSiswa');
Route::post('/guru/crud', 'Database@selectGuru');
Route::post('/mapel/crud', 'Database@selectMatPel');
Route::post('/perodAkad/crud', 'Database@selectPerodAkad');
Route::post('/toa/crud', 'Database@selectToa');
Route::post('/kelas/crud', 'Database@selectKelas');
