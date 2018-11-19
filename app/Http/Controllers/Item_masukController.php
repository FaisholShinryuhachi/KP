<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Item_masuk;
use App\Item;

class Item_masukController extends Controller
{
    public function index(){
    	return view('masuk');
    }

    public function getItem(){

    	$item = DB::table('item')->pluck("name","id_item");
        return view('masuk',compact('item'));
    }

    public function saveData(Request $request){
    	

    	for ($i = 0; $i < count($request->masuk); $i++){

    		$item = Item_masuk::create([			'id_item' 		=> 	$request->masuk[$i],
		    										'jumlah' 		=>	$request->jumlah[$i],
    								]);

    		$data = DB::table('item')->where('id_item',$request->masuk[$i])->pluck('stock')->first();
    		
    		$newData = $data + $request->jumlah[$i];

    		$update = Item::where('id_item',$request->masuk[$i])->update(['stock' => $newData]);

    	}

        if($update){
                     $condition =    [
                                        'alert' => 'success',
                                        'title' => 'Item : ',
                                        'text-1' =>'Transaksi Berhasil',
                                        'text-2' => ''
                                    ];
                    
                   
                }
            else{
                $condition =    [
                                        'alert' => 'danger',
                                        'title' => 'Item : ',
                                        'text-1' => 'Transaksi Gagal',
                                        'text-2' => 'Silahkan Coba Lagi'
                                    ];
            }
             return redirect()->back()->with('condition', $condition);
    }
}
