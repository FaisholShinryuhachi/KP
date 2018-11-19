<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table = 'satuan';
    public $timestamps = true;
    public $guarded =['id_satuan'];
}
