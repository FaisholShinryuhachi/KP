<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Spk;
use App\Item;
use App\Item_masuk;
use App\Item_keluar;
use DB;
use DataTables;

class SpkController extends Controller
{
    public function proses(Request $request){
        $now = Carbon::now();
    	$item = Item::all();

    	DB::table('spk')->truncate();


    	//perulangan insert data pada tabel spk
    	foreach ($item as $value) {	

    	//Penjumlahan masuk
            if ($request->bulan == 'month'){
    	           $sum_masuk = Item_masuk::where('id_item', $value->id_item)->whereMonth('created_at', $now->month)->sum('jumlah');
            }
            else{
                    $sum_masuk = Item_masuk::where('id_item', $value->id_item)->sum('jumlah');
            }

        	if($sum_masuk == null){
        		$sum_masuk = 0;
        	}

        //Penjumlahan Keluar
            if ($request->bulan == 'month'){  
       	           $sum_keluar = Item_keluar::where('id_item', $value->id_item)->whereMonth('created_at', $now->month)->sum('jumlah');
            }
            else{
                    $sum_keluar = Item_keluar::where('id_item', $value->id_item)->sum('jumlah');
            }
        	if($sum_keluar == null){
        		$sum_keluar = 0;
        	}

    	$value->masuk = $sum_masuk;
    	$value->keluar = $sum_keluar;

    	$spk = Spk::create([			'id_item'		=>	$value->id_item,
    									'name' 			=> 	$value->name,
    									'stock' 		=>	$value->stock,
    									'id_satuan' 	=>	$value->id_satuan,
    									'id_category'	=>	$value->id_category,
    									'biaya'			=>	$value->biaya,
    									'keuntungan'	=>	$value->keuntungan,
    									'masuk'			=>	$value->masuk,
    									'keluar'		=>	$value->keluar
    								]);

    	}
        
        //dd($item);

    	//Perhitungan dss topsis
    	$data = Spk::all();

    	$sumStock		= $this->sumCount('stock');
    	$sumBiaya 		= $this->sumCount('biaya');
    	$sumKeuntungan 	= $this->sumCount('keuntungan');
    	$sumMasuk 		= $this->sumCount('masuk');
    	$sumKeluar 		= $this->sumCount('keluar');

    	$stockArray = [];
    	$biayaArray = [];
    	$keuntunganArray = [];
    	$masukArray = [];
    	$keluarArray = [];

    	foreach ($data as $value) {
    		$value->stock = $value->stock / $sumStock;
    		$value->biaya = $value->biaya / $sumBiaya;
    		$value->keuntungan = $value->keuntungan / $sumKeuntungan;
            if ($value->masuk == 0)
    	       $value->masuk = 0;
            else 
                $value->masuk = $value->masuk / $sumMasuk;

            if ($value->keluar == 0)
               $value->keluar = 0;
            else  
    		$value->keluar = $value->keluar / $sumKeluar;
    	}
	
    	foreach ($data as $value) {
    		$value->stock = $value->stock * $request->bobot_stock ;
    		$value->biaya = $value->biaya * $request->bobot_biaya ;
    		$value->keuntungan = $value->keuntungan * $request->bobot_keuntungan ;
    		$value->masuk = $value->masuk * $request->bobot_masuk ;
    		$value->keluar = $value->keluar * $request->bobot_keluar ;
    	}

    	foreach ($data as $value) {
    		array_push($stockArray, $value->stock);
    		array_push($biayaArray, $value->biaya);
    		array_push($keuntunganArray, $value->keuntungan);
    		array_push($masukArray, $value->masuk);
    		array_push($keluarArray, $value->keluar);
    	}

    	$stockMax = max($stockArray);
    	$stockMin = min($stockArray);

    	$biayaMax = max($biayaArray);
    	$biayaMin = min($biayaArray);

    	$keuntunganMax = max($keuntunganArray);
    	$keuntunganMin = min($keuntunganArray);

    	$masukMax = max($masukArray);
    	$masukMin = min($masukArray);

    	$keluarMax = max($keluarArray);
    	$keluarMin = min($keluarArray);
    	
    	foreach ($data as $value) {
    		$value->d_plus = sqrt(	pow( ($value->stock 		- $this->typeAplus($stockMax, $stockMin, $request->stock)) ,2) + 
    								pow( ($value->biaya 		- $this->typeAplus($biayaMax, $biayaMin, $request->biaya)) ,2) + 
    								pow( ($value->keuntungan 	- $this->typeAplus($keuntunganMax, $keuntunganMin, $request->keuntungan)) ,2) + 
    								pow( ($value->masuk 		- $this->typeAplus($masukMax, $masukMin, $request->masuk)) ,2) + 
    								pow( ($value->keluar 		- $this->typeAplus($keluarMax, $keluarMin, $request->keluar)) ,2)
    							);
    	}
    	
    	foreach ($data as $value) {
    		$value->d_minus = sqrt(	pow( ($value->stock 		- $this->typeAminus($stockMax, $stockMin, $request->stock)) ,2) + 
    								pow( ($value->biaya 		- $this->typeAminus($biayaMax, $biayaMin, $request->biaya)) ,2) + 
    								pow( ($value->keuntungan 	- $this->typeAminus($keuntunganMax, $keuntunganMin, $request->keuntungan)) ,2) + 
    								pow( ($value->masuk 		- $this->typeAminus($masukMax, $masukMin, $request->masuk)) ,2) + 
    								pow( ($value->keluar 		- $this->typeAminus($keluarMax, $keluarMin, $request->keluar)) ,2)
    							);
    	}

    	foreach ($data as $value) {
    		$value->v = $value->d_minus / ($value->d_minus + $value->d_plus);
    	}
		
		//simpan data ke database
		foreach ($data as $value) {
				$check = Spk::where('id_item', $value->id_item)->update(['v' => $value->v]);
			}

		if ($check){	
    		return view('hasilSpk');
   		}
   		else
   			echo "Gagal";
    	
    }

    
    public function sumCount($ss){
    	$data = Spk::all();
    	$sum = 0;

    	foreach ($data as $value) {
    		$stock = pow($value->$ss, 2);
    		$sum = $sum + $stock;
    	}
    	$sum = sqrt($sum);
    	return $sum;
    }

    public function typeAplus( $max, $min, $type){
    	if ($type == "cost"){
    		return $min;
    	}
    	else{
    		return $max;
    	}
    }
    public function typeAminus( $max, $min, $type){
    	if ($type == "benefit"){
    		return $min;
    	}
    	else{
    		return $max;
    	}
    }

    public function json(){
    	$spk = Spk::select('spk.name', 'spk.stock', 'spk.v', 'spk.biaya', 'spk.keuntungan', 'spk.masuk', 'spk.keluar', 'satuan.satuan', 'category_product.category_name')
                ->join('category_product', 'category_product.id_category', '=', 'spk.id_category')
                ->join('satuan', 'satuan.id_satuan', '=', 'spk.id_satuan')
                ->orderBy('v', 'desc')
                ->get();

        return Datatables::of($spk)->make(true);
    }
}
