<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    public $timestamps = false;

    public $guarded =['id_item'];
}