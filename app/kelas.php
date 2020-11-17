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


}
