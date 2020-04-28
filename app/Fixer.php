<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixer extends Model
{
    protected $table = 'fixer';
    protected $primaryKey = 'IDFixer';
    public $timestamps = false;
    protected $fillable = ['IDFixer','nameFixer','addressFixer','cityFixer','provinceFixer','IDService'];
}
