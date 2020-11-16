<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ajar_mengajar extends Model
{
    protected $table = 'ajar_mengajar';
    protected $primaryKey = 'id_ajar_mengajar';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;

    
}
