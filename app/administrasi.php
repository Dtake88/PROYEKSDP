<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class administrasi extends Model
{
    protected $table = 'administrasi';
    protected $primaryKey = 'Id_administrasi';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['Nama_administrasi', 'Usernama_administrasi', 'No_administrasi', 'Alamat_administrasi', 'Password_administrasi'];
}
