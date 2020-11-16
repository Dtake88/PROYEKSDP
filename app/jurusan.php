<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
}
