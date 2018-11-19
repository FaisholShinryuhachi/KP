<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_keluar extends Model
{
    protected $table = 'Item_keluar';
    public $timestamps = true;
    public $guarded = ['id_itemkeluar'];
}
	