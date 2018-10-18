<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\customer;

class CustomerController extends Controller
{
    public function getProvinsi(){

    	$provinsi = DB::table('provinsi')->pluck("name","id_provinsi");
        return view('formCustomer',compact('provinsi'));

    }

     public function getKabupaten($id) 
    {
        $kabupaten = DB::table("kabupaten")->where("id_provinsi",$id)->pluck("name","id_kabupaten");
        return json_encode($kabupaten);
    }

    public function saveData(Request $request){

    	$this->validate($request, [	'nama' => 'required',
    								'vendor' => 'required',
    								'cp' => 'required',
    								'provinsi' => 'required',
    								'kabupaten' => 'required',
    								'alamat' => 'required'
    								]);

    	$customer = Customer::create([	'name' 			=> 	ucwords($request->nama),
    									'vendor' 		=>	ucwords($request->vendor),
    									'cp' 			=>	$request->cp,
    									'id_provinsi'	=>	$request->provinsi,
    									'id_kabupaten' 	=>	$request->kabupaten,
    									'alamat' 		=>	ucfirst($request->alamat)
    								]);

        if($customer)
            echo "Berhasil";
        else
            echo "gagal";

    	//return redirect('new/customer');

    }
}
