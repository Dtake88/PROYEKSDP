<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class administrasi extends Model
{
    use SoftDeletes;

    protected $table = 'administrasi';
    protected $primaryKey = 'Id_administrasi';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['Nama_administrasi', 'Username_administrasi', 'No_administrasi', 'Alamat_administrasi', 'Password_administrasi'];




}
