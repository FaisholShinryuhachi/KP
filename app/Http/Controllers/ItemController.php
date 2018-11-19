<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Item;
use App\Item_masuk;
use DataTables;


class ItemController extends Controller
{
 
    public function index(){
        return view('item');
    }

    public function json(){

         $item = Item::select('item.id_item', 'item.name', 'item.stock', 'satuan.satuan', 'category_product.category_name')
                ->join('category_product', 'category_product.id_category', '=', 'item.id_category')
                ->join('satuan', 'satuan.id_satuan', '=', 'item.id_satuan')
                ->get();

        return Datatables::of($item)
                        ->addColumn('action', function ($item) {
                        return '<a href="/item/action/'.$item->id_item.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                            <a href="/item/action/'.$item->id_item.'/hapus" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i>Delete</a>';
                        })
                        ->make(true);
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
                                    'category' => 'required',
                                    'biaya' => 'required',
    								'keuntungan' => 'required'
 
    								]);

    	$item = Item::create([			'name' 			=> 	ucwords($request->nama),
    									'stock' 		=>	$request->jumlah,
    									'id_satuan' 	=>	$request->satuan,
                                        'id_category'   =>  $request->category,
                                        'biaya'         =>  $request->biaya,
    									'keuntungan'	=>	$request->keuntungan    								
                                    ]);

    	if($item){
            $condition =    [
                                'alert' => 'success',
                                'title' => 'Item : ',
                                'text-1' => ucwords($request->nama),
                                'text-2' => ' Berhasil Ditambahkan'
                            ];
        }
        else {
             $condition =    [
                                'alert' => 'danger',
                                'title' => 'Item : ',
                                'text-1' => ucwords($request->nama),
                                'text-2' => 'Gagal Ditambahkan , Silahkan Coba Lagi.'
                            ];
        }
           
        return redirect()->back()->with('condition', $condition);

    }


    public function jsonForm(){
         $item = Item::select('name', 'stock')
                ->get(); 

        return Datatables::of($item)->make(true); 
    }

    //function stock
        public function stock(){
        $masuk = Item_masuk::select('jumlah')->where('id_item', 1)->get();
        return view('chart', compact('masuk'));
    }
    public function action($id, $type){

        $item = Item::where('id_item',$id)->first();
        $category = DB::table('category_product')->pluck("category_name","id_category");
        $satuan = DB::table('satuan')->pluck("satuan","id_satuan");
        if ($type == "edit")
        return view('editItem',compact('category', 'satuan', 'item'));
        else
        return view('confirmItem',compact('category', 'satuan', 'item'));
    }
    public function update(Request $request){
        $this->validate($request, [ 'nama' => 'required',
                                    'jumlah' => 'required',
                                    'satuan' => 'required',
                                    'category' => 'required',
                                    'biaya' => 'required',
                                    'keuntungan' => 'required'
 
                                    ]);

        $item = Item::where('id_item', $request->id)
                            ->update([  'name'          =>  ucwords($request->nama),
                                        'stock'         =>  $request->jumlah,
                                        'id_satuan'     =>  $request->satuan,
                                        'id_category'   =>  $request->category,
                                        'biaya'         =>  $request->biaya,
                                        'keuntungan'    =>  $request->keuntungan  
                                    ]);
        if($item){
            $condition =    [
                                'alert' => 'success',
                                'title' => 'Item : ',
                                'text-1' => ucwords($request->nama),
                                'text-2' => ' Berhasil Di Update'
                            ];
        }
        else {
             $condition =    [
                                'alert' => 'danger',
                                'title' => 'Item : ',
                                'text-1' => ucwords($request->nama),
                                'text-2' => 'Gagal Di Update , Silahkan Coba Lagi.'
                            ];
        }
         return redirect('item')->with('condition', $condition);
    }

    public function delete(Request $request){
        $item = Item::where('id_item', $request->id)->delete();
        if($item){
            $condition =    [
                                'alert' => 'success',
                                'title' => 'Item : ',
                                'text-1' => ucwords($request->nama),
                                'text-2' => ' Berhasil Di Delete'
                            ];
        }
        else {
             $condition =    [
                                'alert' => 'danger',
                                'title' => 'Item : ',
                                'text-1' => ucwords($request->nama),
                                'text-2' => 'Gagal Di Delete , Silahkan Coba Lagi.'
                            ];
        }
         return redirect('item')->with('condition', $condition);
    }
}


