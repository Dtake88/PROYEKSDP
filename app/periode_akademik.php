<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class periode_akademik extends Model
{
    protected $table = 'periode_akademik';
    protected $primaryKey = 'Id_periode';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['Tahun_ajaran', 'Semester', 'Status'];
}
