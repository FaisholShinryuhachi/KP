<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   	protected $table = 'customer';
    public $timestamps = true;
    protected $guarded = ['id_customer'];
}
