<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';
    protected $primaryKey = 'IDService';
    public $timestamps = false;
    protected $fillable = ['IDService','nameService','priceService'];
}
