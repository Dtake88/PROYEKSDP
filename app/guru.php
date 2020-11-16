<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'NIG';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['Nama_guru', 'Password_guru', 'No_guru', 'Alamat_guru', 'Status_guru'];


    
}
