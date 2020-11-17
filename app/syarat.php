<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class syarat extends Model
{
    protected $table = 'syarat';
    protected $primaryKey = 'id_syarat';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
}
