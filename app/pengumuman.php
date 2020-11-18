<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pengumuman extends Model
{


    use SoftDeletes;
    protected $table = 'pengumuman';
    protected $primaryKey = 'id_pengumuman';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
}
