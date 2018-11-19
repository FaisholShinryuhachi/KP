<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;
use App\Kabupaten;
use App\Provinsi;
use DataTables;

class CustomerController extends Controller
{
    public function index(){
        return view('customer');
    }

    public function json(){
        $customer = Customer::select('customer.id_customer', 'customer.customer_name', 'customer.vendor', 'customer.cp', 'customer.alamat',
                                        'provinsi.provinsi_name', 'kabupaten.kabupaten_name')
                ->join('provinsi', 'provinsi.id_provinsi', '=', 'customer.id_provinsi')
                ->join('kabupaten', 'kabupaten.id_kabupaten', '=', 'customer.id_kabupaten')
                ->get(); 

         return Datatables::of($customer)
                        ->addColumn('action', function ($customer) {
                        return '<a href="/customer/action/'.$customer->id_customer.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                            <a href="/customer/action/'.$customer->id_customer.'/hapus" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i>Delete</a>';
                        })
                        ->make(true);
    }

    public function getProvinsi(){

    	$provinsi = DB::table('provinsi')->pluck("provinsi_name","id_provinsi");
        return view('formCustomer',compact('provinsi'));

    }

     public function getKabupaten($id) 
    {
        $kabupaten = DB::table("kabupaten")->where("id_provinsi",$id)->pluck("kabupaten_name","id_kabupaten");
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

    	$customer = Customer::create([	'customer_name' 			=> 	ucwords($request->nama),
    									'vendor' 		            =>	ucwords($request->vendor),
    									'cp' 			            =>	$request->cp,
    									'id_provinsi'	            =>	$request->provinsi,
    									'id_kabupaten' 	            =>	$request->kabupaten,
    									'alamat' 		            =>	ucfirst($request->alamat)
    								]);

        if($customer){
            $condition =    [
                                'alert' => 'success',
                                'title' => 'Customer : ',
                                'text-1' => ucwords($request->nama),
                                'text-2' => ' Berhasil Ditambahkan'
                            ];
        }
        else {
             $condition =    [
                                'alert' => 'danger',
                                'title' => 'Customer : ',
                                'text-1' => ucwords($request->nama),
                                'text-2' => 'Gagal Ditambahkan , Silahkan Coba Lagi.'
                            ];
        }
           
        return redirect()->back()->with('condition', $condition);

    }

    public function coba(Request $request){
            echo $request->satuan[0]."</br>";
            echo $request->satuan[1]."</br>";
    }
    public function jsonForm(){
         $customer = Customer::select('customer_name', 'vendor', 'cp')
                ->get(); 

        return Datatables::of($customer)->make(true); 
    }
    public function action($id, $type){
        $customer = customer::where('id_customer', $id )->first();
        $kabupaten = DB::table("kabupaten")->pluck("kabupaten_name","id_kabupaten");
        $provinsi = DB::table('provinsi')->pluck('provinsi_name', 'id_provinsi');

        if ($type == "edit")
        return view('editCustomer', compact('customer', 'kabupaten', 'provinsi'));
        else
        return view('confirmCustomer', compact('customer', 'kabupaten', 'provinsi'));
    }

     public function update(Request $request){
        $this->validate($request, ['nama' => 'required',
                                    'vendor' => 'required',
                                    'cp' => 'required',
                                    'provinsi' => 'required',
                                    'kabupaten' => 'required',
                                    'alamat' => 'required'
                                    ]);

        $customer = Customer::where('id_customer', $request->id)
                            ->update([  'customer_name'             =>  ucwords($request->nama),
                                        'vendor'                    =>  ucwords($request->vendor),
                                        'cp'                        =>  $request->cp,
                                        'id_provinsi'               =>  $request->provinsi,
                                        'id_kabupaten'              =>  $request->kabupaten,
                                        'alamat'                    =>  ucfirst($request->alamat)
                                    ]);
        if($customer){
            $condition =    [
                                'alert' => 'success',
                                'title' => 'Customer : ',
                                'text-1' => ucwords($request->nama),
                                'text-2' => ' Berhasil Di Update'
                            ];
        }
        else {
             $condition =    [
                                'alert' => 'danger',
                                'title' => 'Customer : ',
                                'text-1' => ucwords($request->nama),
                                'text-2' => 'Gagal Di Update , Silahkan Coba Lagi.'
                            ];
        }
         return redirect('customer')->with('condition', $condition);
    }

    public function delete(Request $request){
        $customer = Customer::where('id_customer', $request->id)->delete();

         if($customer){
            $condition =    [
                                'alert' => 'success',
                                'title' => 'Customer : ',
                                'text-1' => ucwords($request->nama),
                                'text-2' => ' Berhasil Di Delete'
                            ];
        }
        else {
             $condition =    [
                                'alert' => 'danger',
                                'title' => 'customer : ',
                                'text-1' => ucwords($request->nama),
                                'text-2' => 'Gagal Di Delete , Silahkan Coba Lagi.'
                            ];
        }
         return redirect('customer')->with('condition', $condition);
    }
}
