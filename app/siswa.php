<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'NIS';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['Nama_siswa', 'Password_siswa', 'Tempat_lahir_siswa', 'Tanggal_lahir_siswa', 'Nama_ibu', 'Nama_ayah', 'Status_siswa', 'NISN', 'Agama', 'Jenis_kelamin', 'Alamat_siswa'];
}
