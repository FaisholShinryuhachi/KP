@extends('layout.mylayout')

@section('title', 'Enol - New Item')
@section('pageHeader','Form Tambah Item')


@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li> 
            <li class="breadcrumb-item active">New Item</li>
          </ol>
@endsection

@section('content')
		<div class="row">
		<div class="col-md-6">
          <form action="{{ url('item/save') }}" method="POST">
          	  <div class="form-group row">
			    <label for="inputNama" class="col-sm-4 col-form-label">Nama Item</label>
			    <div class="col-sm-8">
			      <input name="nama" type="text" class="form-control" id="inputNama" placeholder="Nama Item" value="{{old('nama')}}">
			      @if($errors->has('nama'))
				      	<small class="form-text text-muted" >
					  		Nama Tidak Boleh Kosong
						</small>
					@endif
			    </div>
			  </div> 
			  <div class="form-group row">
			    <label for="inputStock" class="col-sm-4 col-form-label">Jumlah Stock</label>
			    <div class="col-sm-8">
			      <input name="jumlah" type="number" class="form-control" id="inputStock" placeholder="Jumlah Stock" value="{{old('jumlah')}}">
			      @if($errors->has('jumlah'))
				      	<small class="form-text text-muted" >
					  		Nama Tidak Boleh Kosong
						</small>
					@endif
			    </div>
			  </div> 
			  <div class="form-group row">
			    <label for="inputSatuan" class="col-sm-4 col-form-label">Satuan</label>
			    <div class="col-sm-8">
				    <select name="satuan" class="form-control" id="inputSatuan" value="{{old('satuan')}}">
				    	@foreach ($satuan as $key => $value)
	                    <option value="{{ $key }}">{{ $value }}</option>
	                    @endforeach

	                    @if($errors->has('satuan'))
				      	<small class="form-text text-muted" >
					  		Satuan Tidak Boleh Kosong
						</small>
					@endif
					</select>
			    </div>
			  </div> <div class="form-group row">
			    <label for="inputCategory" class="col-sm-4 col-form-label">Category</label>
			    <div class="col-sm-8">
				    <select name="category" class="form-control" id="inputCategory">
	                    @foreach ($category as $key => $value)
	                    <option value="{{ $key }}">{{ $value }}</option>
	                    @endforeach

	                    @if($errors->has('category'))
				      	<small class="form-text text-muted" >
					  		Category Tidak Boleh Kosong
						</small>
					@endif
					</select>
			    </div>
			  </div> 

			  <div class="form-group row">
			    <label for="inputBiaya" class="col-sm-4 col-form-label">Biaya</label>
			    <div class="col-sm-8">
			      <input name="biaya" type="number" class="form-control" id="inputBiaya" placeholder="Biaya Product" value="{{old('biaya')}}">
			      @if($errors->has('biaya'))
				      	<small class="form-text text-muted" >
					  		Biaya Tidak Boleh Kosong
						</small>
					@endif
			    </div>
			  </div> 

			  <div class="form-group row">
			    <label for="inputKeuntungan" class="col-sm-4 col-form-label">Keuntungan Item</label>
			    <div class="col-sm-8">
			      <input name="keuntungan" type="number" class="form-control" id="inputKeuntungan" placeholder="Keuntungan Item" value="{{old('keuntungan')}}">
			      @if($errors->has('keuntungan'))
				      	<small class="form-text text-muted" >
					  		Keuntungan Tidak Boleh Kosong
						</small>
					@endif
			    </div>
			  </div> 
			  
             <button type="submit" class="btn btn-raised btn-primary pull-right col-md-12">Simpan</button>
            {{csrf_field()}}
          </form>
     	</div>
     	 <div class="col-md-6">
            <table class="table table-bordered" id="users-table">
              <thead>
                <tr>
                    <th>Nama</th>
                    <th>Stock</th>
                </tr>
              </thead>
            </table>
          </div>
		</div>
@push('scripts')
  <script>
  $(function() {
      $('#users-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{"/item/json-form"}}',
          columns: [
              { data: 'name', name: 'name' },
              { data: 'stock', name: 'stock' },
          ]
      });
  });
  </script>
@endpush

@endsection