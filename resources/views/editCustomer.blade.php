@extends('layout.mylayout')

@section('title', 'Enol - Edit Customer')
@section('pageHeader','Edit Customer')

@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Customer</li>
          </ol>
@endsection

@section('content')
		<div class="row">
		 <div class="col-md-6">
          <form action="{{ url('customer/update') }}" method="POST">
          	<div class="form-group row">
			    <label for="id" class="col-sm-2 col-form-label">Id</label>
			    <div class="col-sm-10">
			      <input readonly="true" name="id" type="text" class="form-control" id="id" value="{{$customer->id_customer}}">
			      	@if($errors->has('nama'))
				      	<small class="form-text text-muted" >
					  		Nama Tidak Boleh Kosong
						</small>
					@endif
			    </div>
			  </div> 
          	  <div class="form-group row">
			    <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
			    <div class="col-sm-10">
			      <input name="nama" type="text" class="form-control" id="inputNama" placeholder="Nama" value="{{$customer->customer_name}}">
			      	@if($errors->has('nama'))
				      	<small class="form-text text-muted" >
					  		Nama Tidak Boleh Kosong
						</small>
					@endif
			    </div>
			  </div> 
			  <div class="form-group row">
			    <label for="inputVendor" class="col-sm-2 col-form-label">Vendor</label>
			    <div class="col-sm-10">
			      <input name="vendor" type="text" class="form-control" id="inputVendor" placeholder="Vendor" value="{{$customer->vendor}}">
			      @if($errors->has('vendor'))
				      	<small class="form-text text-muted" >
					  		Nama Vendor Tidak Boleh Kosong
						</small>
					@endif
			    </div>
			  </div> 
			  <div class="form-group row">
			    <label for="inputContactPerson" class="col-sm-2 col-form-label">Contact Person</label>
			    <div class="col-sm-10">
			      <input name="cp" type="text" class="form-control" id="inputContactPerson" placeholder="Contact Person" value="{{$customer->cp}}">
			      @if($errors->has('cp'))
				      	<small class="form-text text-muted" >
					  		Cp Tidak Boleh Kosong
						</small>
					@endif
			    </div>
			  </div> 
			  <div class="form-group row">
			    <label for="inputProvinsi" class="col-sm-2 col-form-label">Provinsi</label>
			    <div class="col-sm-10">
				    <select name="provinsi" class="form-control" id="inputProvinsi">
				    	@foreach ($provinsi as $key => $value)
	                    <option
	                    @if ($key == $customer->id_provinsi)
	                    selected="true"
	                    @endif
	                    value="{{ $key }}">{{ $value }}</option>
	                    @endforeach
					</select>
					@if($errors->has('provinsi'))
				      	<small class="form-text text-muted" >
					  		Provinsi Tidak Boleh Kosong
						</small>
					@endif
			    </div>
			  </div> 
			  <div class="form-group row">
			    <label for="inputKabupaten" class="col-sm-2 col-form-label">Kabupaten</label>
			    <div class="col-sm-10">
			     	<select name="kabupaten" class="form-control" id="inputKabupaten">
	  				@foreach ($kabupaten as $key => $value)
	                    <option
	                    @if ($key == $customer->id_kabupaten)
	                    selected="true"
	                    @endif
	                    value="{{ $key }}">{{ $value }}</option>
	                    @endforeach
					</select>
					@if($errors->has('kabupaten'))
				      	<small class="form-text text-muted" >
					  		Kabupaten Tidak Boleh Kosong
						</small>
					@endif
			    </div>
			  </div>  
			  <div class="form-group row">
			    <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
			    <div class="col-sm-10">
			       <textarea name="alamat" class="form-control" id="inputAlamat" rows="4">{{$customer->alamat}}</textarea>
			       @if($errors->has('alamat'))
				      	<small class="form-text text-muted" >
					  		Alamat Tidak Boleh Kosong
						</small>
					@endif
			    </div>
			  </div>
            <!--a class="btn btn-primary btn-block" href="{{url('new/customer/save')}}">Register</a-->
            <button type="submit" class="btn btn-raised btn-primary pull-right col-md-12">Simpan</button>
            {{csrf_field()}}
          </form>
      </div>
  </div>
@endsection