<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Item;
use DataTables;


class ItemController extends Controller
{
 
    public function index(){
        return view('cobaku');
    }

    public function json(){

         $item = Item::select('item.name', 'item.stock', 'satuan.satuan', 'category_product.category_name')
                ->join('category_product', 'category_product.id_category', '=', 'item.id_category')
                ->join('satuan', 'satuan.id_satuan', '=', 'item.id_satuan')
                ->get();

        return Datatables::of($item)->make(true);
    }

    public function getCatSat(){
    	$category = DB::table('category_product')->pluck("category_name","id_category");
    	$satuan = DB::table('satuan')->pluck("satuan","id_satuan");

        return view('formItem',compact('category', 'satuan'));

    }

    public function saveData(Request $request){


    	$this->validate($request, [	'nama' => 'required',
    								'jumlah' => 'required',
    								'satuan' => 'required',
    								'category' => 'required'
 
    								]);

    	$item = Item::create([			'name' 			=> 	ucwords($request->nama),
    									'stock' 		=>	$request->jumlah,
    									'id_satuan' 	=>	$request->satuan,
    									'id_category'	=>	$request->category
    								]);

    	return redirect('/');

    }

    public function coba(){

        /*$item = Item::select('item.name', 'satuan.satuan')
                ->join('satuan', 'satuan.id_satuan', '=', 'item.id_satuan')
                ->get();

                dd($item); */
        $item = Item::select('item.name', 'category_product.category_name')
                ->join('category_product', 'category_product.id_category', '=', 'item.id_category')
                ->get();

                dd($item); 
    }

}


