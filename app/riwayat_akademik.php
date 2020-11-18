<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class riwayat_akademik extends Model
{
    use SoftDeletes;
    protected $table = 'riwayat_akademik';
    protected $primaryKey = 'id_riwayat_akademik';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;


    public function kelas(){
        return $this->hasOne(kelas::class,"Id_kelas","Id_kelas");
    }

    public function  mapel(){
        return $this->hasOne(mapel::class,"Id_mapel","Id_mapel");
    }


    public function siswa(){
        return $this->belongsTo(siswa::class,"NIS","NIS");
    }

}
