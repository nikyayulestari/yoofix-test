<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usr extends Model
{
    protected $table = 'usr';
    protected $primaryKey = 'emailUser';
    public $timestamps = false;
    protected $fillable = ['emailUser','nameUser','addressUser','cityUser','provinceUser','kontakUser'];
}
