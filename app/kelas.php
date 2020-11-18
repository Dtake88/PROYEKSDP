<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;


    public function periode(){
        return $this->hasOne(periode_akademik::class,"id_kelas","id_periode");
    }

    public function guru(){
        return $this->belongsTo(guru::class,"NIG","NIG");
    }

    public function jurusan(){
        return $this->hasOne(jurusan::class,"id_jurusan","id_jurusan");
    }

    



}
