<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DataTables;
use DB;
use App\Item_keluar;
use App\Item;

class Item_keluarController extends Controller
{	

	public function index(){
		return view('keluar');
	}
    public function json(){
    	$customer = Customer::select('customer.id_customer','customer.customer_name', 'customer.vendor', 'customer.cp', 'customer.alamat',
                                        'provinsi.provinsi_name', 'kabupaten.kabupaten_name')
                ->join('provinsi', 'provinsi.id_provinsi', '=', 'customer.id_provinsi')
                ->join('kabupaten', 'kabupaten.id_kabupaten', '=', 'customer.id_kabupaten')
                ->get(); 

        return Datatables::of($customer)
        		->addColumn('action', function ($customer) {
                return '<a href="/keluar/save/'.$customer->id_customer.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Add</a>';
            		})
        		->make(true); 
    }

    public function save($id){

    	$customer = Customer::select('id_customer','customer_name')->where('id_customer',$id)->first();
    	$item = DB::table('item')->pluck("name","id_item");
        return view('keluarTambahItem',compact('item','customer'));
    }

    public function saveData(Request $request){
        $perh = [];

        //Perhitungan Kosong
        for ($i = 0; $i < count($request->keluar); $i++){
           $data = DB::table('item')->where('id_item',$request->keluar[$i])->pluck('stock')->first();
            
            $newData = $data - $request->jumlah[$i];

            if($newData <= -1){
                $name = DB::table('item')->where('id_item',$request->keluar[$i])->pluck('name')->first();
                array_push($perh, $name);
            } 
        }

        if($perh != null){
            $str = "";
            $no = 1;
            foreach ($perh as $value) {
               $str = $str.$no.".".$value." ";
               $no++;
            }

            $condition =    [
                                'alert' => 'danger',
                                'title' => 'Item : ',
                                'text-1' => 'Stock Tidak Mencukupi',
                                'text-2' => $str
                            ];
            return redirect()->back()->with('condition', $condition);
        }
        else {
            for ($i = 0; $i < count($request->keluar); $i++){



            $item = Item_keluar::create([           'id_customer'   =>  $request->id_customer,
                                                    'id_item'       =>  $request->keluar[$i],
                                                    'jumlah'        =>  $request->jumlah[$i]
                                                    
                                    ]);
            
            $data = DB::table('item')->where('id_item',$request->keluar[$i])->pluck('stock')->first();
            
            $newData = $data - $request->jumlah[$i];

            $update = Item::where('id_item',$request->keluar[$i])->update(['stock' => $newData]);
            
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
}
