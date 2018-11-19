@extends('layout.mylayout')

@section('title', 'Enol - Hapus Item')
@section('pageHeader','Confirm Hapus Item')


@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li> 
            <li class="breadcrumb-item active">Hapus Item</li>
          </ol>
@endsection

@section('content')
		<div class="row">
		<div class="col-md-6">
          <form action="{{ url('item/delete') }}" method="POST">
          	  <div class="form-group row">
			    <label for="id" class="col-sm-4 col-form-label">Id</label>
			    <div class="col-sm-8">
			      <input readonly="true" name="id" type="text" class="form-control" id="id" value="{{$item->id_item}}">
			    </div>
			  </div> 
          	  <div class="form-group row">
			    <label for="inputNama" class="col-sm-4 col-form-label">Nama Item</label>
			    <div class="col-sm-8">
			      <input readonly="true" name="nama" type="text" class="form-control" id="inputNama" placeholder="Nama Item" value="{{$item->name}}">
			    </div>
			  </div> 
			  <div class="form-group row">
			    <label for="inputStock" class="col-sm-4 col-form-label">Jumlah Stock</label>
			    <div class="col-sm-8">
			      <input readonly="true" name="jumlah" type="number" class="form-control" id="inputStock" placeholder="Jumlah Stock" value="{{$item->stock}}">
			    </div>
			  </div> 
			  <div class="form-group row">
			    <label for="inputSatuan" class="col-sm-4 col-form-label">Satuan</label>
			    <div class="col-sm-8">
				    <select readonly="true" name="satuan" class="form-control" id="inputSatuan" value="{{old('satuan')}}">
				    	@foreach ($satuan as $key => $value)
	                    <option
	                    @if($key == $item->id_satuan)
	                    selected
	                    @endif
	                     value="{{ $key }}">{{ $value }}</option>
	                    @endforeach

	           
					</select>
			    </div>
			  </div>  <div class="form-group row">
			    <label for="inputCategory" class="col-sm-4 col-form-label">Category</label>
			    <div class="col-sm-8">
				    <select readonly="true" name="category" class="form-control" id="inputCategory">
	                    @foreach ($category as $key => $value)
	                    <option
	                     @if($key == $item->id_category)
	                    selected
	                    @endif
	                     value="{{ $key }}">{{ $value }}</option>
	                    @endforeach
					
					</select>
			    </div>
			  </div> 

			  <div class="form-group row">
			    <label for="inputBiaya" class="col-sm-4 col-form-label">Biaya</label>
			    <div class="col-sm-8">
			      <input readonly="true" name="biaya" type="number" class="form-control" id="inputBiaya" placeholder="Biaya Product" value="{{$item->biaya}}">
			    </div>
			  </div> 

			  <div class="form-group row">
			    <label for="inputKeuntungan" class="col-sm-4 col-form-label">Keuntungan Item</label>
			    <div class="col-sm-8">
			      <input readonly="true" name="keuntungan" type="number" class="form-control" id="inputKeuntungan" placeholder="Keuntungan Item" value="{{$item->keuntungan}}">
			    </div>
			  </div> 
			  
             <button type="submit" class="btn btn-raised btn-danger pull-right col-md-12">Hapus</button>
            {{csrf_field()}}
          </form>
     	</div>
		</div>

@endsection