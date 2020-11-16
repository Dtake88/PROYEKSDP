<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{

    protected $table = 'mapel';
    protected $primaryKey = 'id_mapel';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
}
