<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_masuk extends Model
{
    protected $table = 'Item_masuk';
    public $timestamps = true;
    public $guarded =['id_item_masuk '] ;
}
