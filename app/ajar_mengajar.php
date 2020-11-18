<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ajar_mengajar extends Model
{

    use SoftDeletes;

    protected $table = 'ajar_mengajar';
    protected $primaryKey = 'id_ajar_mengajar';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;


    public function kelas(){
        return $this->hasOne(kelas::class,"Id_kelas","Id_kelas");
    }

    public function mapel(){
        return $this->hasOne(mapel::class,"Id_mapel","Id_mapel");
    }

    public function guru(){
        return $this->belongsTo(guru::class,"NIG","NIG");
    }


}
