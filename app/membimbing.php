<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class membimbing extends Model
{
    protected $table = 'membimbing';
    protected $primaryKey = 'id_membimbing';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
}
