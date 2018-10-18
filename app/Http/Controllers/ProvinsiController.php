<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provinsi;
use DB;

class ProvinsiController extends Controller
{
    public function getProvinsi(){

    	$provinsi = DB::table('provinsi')->pluck("name","id_provinsi");
        return view('formCustomer',compact('provinsi'));

    }

     public function getStates($id) 
    {
        $kabupaten = DB::table("kabupaten")->where("id_provinsi",$id)->pluck("name","id_kabupaten");
        return json_encode($kabupaten);
    }
}
