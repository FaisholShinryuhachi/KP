<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KabupatenController extends Controller
{
     public function getData(){
    	$dataKabupaten = Provinsi::all();

    	return view('formCustomer', compact('dataKabupaten'));
    }
}
