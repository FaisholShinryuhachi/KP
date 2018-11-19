<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category_product;
use DataTables;

class Category_productController extends Controller
{
	 public function index(){
    	return view('category');
    }

    public function new(){
    	return view('formCategory');
    }

    public function json(){
    	$category = Category_product::select("id_category", "category_name")->get();
    	return Datatables::of($category)
                        ->addColumn('action', function ($category) {
                        return '<a href="/category/action/'.$category->id_category.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                            <a href="/category/action/'.$category->id_category.'/hapus" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i>Delete</a>';
                        })
                        ->make(true);
    }
    
    public function saveData(Request $request){

        $this->validate($request, [ 'category' => 'required'
                                    ]);

        $category = Category_product::create(['category_name'  =>  ucwords($request->category) ]);

        if($category){
            $condition =    [
                                'alert' => 'success',
                                'title' => 'Category Product : ',
                                'text-1' => ucwords($request->category),
                                'text-2' => ' Berhasil Ditambahkan'
                            ];
        }
        else {
             $condition =    [
                                'alert' => 'danger',
                                'title' => 'Category Product : ',
                                'text-1' => ucwords($request->category),
                                'text-2' => 'Gagal Ditambahkan , Silahkan Coba Lagi.'
                            ];
        }
           
        return redirect()->back()->with('condition', $condition);

    }
    public function jsonForm(){
        $category = Category_product::select('category_name', 'created_at')
                    ->get();

        return Datatables::of($category)->make(true);
    }

    public function action($id, $type){
        $category = Category_product::where('id_category', $id )->first();
        
        if ($type == "edit")
            return view('editCategory', compact('category'));
        else
            return view('confirmCategory', compact('category'));
    }

     public function update(Request $request){
       $this->validate($request, [ 'category' => 'required'
                                    ]);

        $category = Category_product::where('id_category', $request->id)
                            ->update(['category_name'  =>  ucwords($request->category) ]);
        if($category){
            $condition =    [
                                'alert' => 'success',
                                'title' => 'Category : ',
                                'text-1' => ucwords($request->category),
                                'text-2' => ' Berhasil Di Update'
                            ];
        }
        else {
             $condition =    [
                                'alert' => 'danger',
                                'title' => 'Category : ',
                                'text-1' => ucwords($request->category),
                                'text-2' => 'Gagal Di Update , Silahkan Coba Lagi.'
                            ];
        }
         return redirect('category')->with('condition', $condition);
    }

    public function delete(Request $request){
        $category = Category_product::where('id_category', $request->id)->delete();

        if($category){
            $condition =    [
                                'alert' => 'success',
                                'title' => 'Category : ',
                                'text-1' => ucwords($request->category),
                                'text-2' => ' Berhasil Di Delete'
                            ];
        }
        else {
             $condition =    [
                                'alert' => 'danger',
                                'title' => 'Category : ',
                                'text-1' => ucwords($request->category),
                                'text-2' => 'Gagal Di Delete , Silahkan Coba Lagi.'
                            ];
        }
         return redirect('category')->with('condition', $condition);
    }

}
