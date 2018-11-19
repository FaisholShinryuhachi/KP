<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satuan;
use DataTables;

class SatuanController extends Controller
{
	public function index(){
		return view('satuan');
	}

     public function new(){
    	return view('formSatuan');
    }

     public function json(){
    	$satuan = Satuan::select("satuan", "id_satuan")->get();
    	return Datatables::of($satuan)
                        ->addColumn('action', function ($satuan) {
                        return '<a href="/satuan/action/'.$satuan->id_satuan.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                            <a href="/satuan/action/'.$satuan->id_satuan.'/hapus" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i>Delete</a>';
                        })
                        ->make(true);
    }

    public function saveData(Request $request){

        $this->validate($request, [ 'satuan' => 'required'
                                    ]);

        $satuan = Satuan::create(['satuan'  =>  ucwords($request->satuan) ]);

        if($satuan){
            $condition =    [
                                'alert' => 'success',
                                'title' => 'Satuan : ',
                                'text-1' => ucwords($request->satuan),
                                'text-2' => ' Berhasil Ditambahkan'
                            ];
        }
        else {
             $condition =    [
                                'alert' => 'danger',
                                'title' => 'Satuan : ',
                                'text-1' => ucwords($request->satuan),
                                'text-2' => 'Gagal Ditambahkan , Silahkan Coba Lagi.'
                            ];
        }
           
        return redirect()->back()->with('condition', $condition);

    }

        public function jsonForm(){

            $satuan = Satuan::select('satuan','created_at')
                    ->get();

        return Datatables::of($satuan)->make(true);
    }

    public function action($id, $type){
        $satuan = Satuan::where('id_satuan', $id )->first();

        if ($type == "edit")
            return view('editSatuan', compact('satuan'));
        else
            return view('confirmSatuan', compact('satuan'));
    }

     public function update(Request $request){
       $this->validate($request, [ 'satuan' => 'required'
                                    ]);

        $satuan = Satuan::where('id_satuan', $request->id)
                            ->update(['satuan'  =>  ucwords($request->satuan) ]);
        if($satuan){
            $condition =    [
                                'alert' => 'success',
                                'title' => 'Satuan : ',
                                'text-1' => ucwords($request->satuan),
                                'text-2' => ' Berhasil Di Update'
                            ];
        }
        else {
             $condition =    [
                                'alert' => 'danger',
                                'title' => 'Satuan : ',
                                'text-1' => ucwords($request->satuan),
                                'text-2' => 'Gagal Di Update , Silahkan Coba Lagi.'
                            ];
        }
         return redirect('satuan')->with('condition', $condition);
    }

    public function delete(Request $request){
        $satuan = Satuan::where('id_satuan', $request->id)->delete();

         if($satuan){
            $condition =    [
                                'alert' => 'success',
                                'title' => 'Satuan : ',
                                'text-1' => ucwords($request->satuan),
                                'text-2' => ' Berhasil Di Hapus'
                            ];
        }
        else {
             $condition =    [
                                'alert' => 'danger',
                                'title' => 'Satuan : ',
                                'text-1' => ucwords($request->satuan),
                                'text-2' => 'Gagal Di Hapus , Silahkan Coba Lagi.'
                            ];
        }
         return redirect('satuan')->with('condition', $condition);
    }
}


