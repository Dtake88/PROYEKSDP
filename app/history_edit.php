<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class history_edit extends Model
{
    protected $table = 'history_edit';
    protected $primaryKey = 'Id_history_edit';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['Id_table', 'Id_pengedit', 'Tanggal_edit'];
}
