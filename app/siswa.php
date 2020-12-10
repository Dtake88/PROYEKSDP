<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as AuthSiswa;

class siswa extends AuthSiswa
{
    use SoftDeletes;

    protected $table = 'siswa';
    protected $primaryKey = 'NIS';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable =
    [
        'Nama_siswa',
        'Password_siswa',
        'Tempat_lahir_siswa',
        'Tanggal_lahir_siswa',
        'Nama_ibu',
        'Nama_ayah',
        'Status_siswa',
        'NISN',
        'Agama',
        'Jenis_kelamin',
        'Alamat_siswa',
        'id_kelas',
        'id_jurusan',
        'Email_siswa',
    ];

  /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->Password_siswa;
    }




}
