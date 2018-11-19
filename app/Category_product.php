<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_product extends Model
{
    protected $table = 'Category_product';
    public $timestamps = true;
    public $guarded =['id_category'];
}
