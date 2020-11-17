<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $primaryKey = 'id_pengumuman';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
}
