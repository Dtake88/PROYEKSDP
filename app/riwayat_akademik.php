<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class riwayat_akademik extends Model
{
    protected $table = 'riwayat_akademik';
    protected $primaryKey = 'id_riwayat_akademik';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
}
