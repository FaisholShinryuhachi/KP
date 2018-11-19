@extends('layout.mylayout')

@section('title', 'Enol - Hapus Customer')
@section('pageHeader','Confirm Hapus Customer')

@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Hapus Customer</li>
          </ol>
@endsection

@section('content')
		<div class="row">
		 <div class="col-md-6">
          <form action="{{ url('customer/delete') }}" method="POST">
          	<div class="form-group row">
			    <label for="id" class="col-sm-2 col-form-label">Id</label>
			    <div class="col-sm-10">
			      <input readonly="true" name="id" type="text" class="form-control" id="id" value="{{$customer->id_customer}}">
			    </div>
			  </div> 
          	  <div class="form-group row">
			    <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
			    <div class="col-sm-10">
			      <input readonly="true" name="nama" type="text" class="form-control" id="inputNama" placeholder="Nama" value="{{$customer->customer_name}}">
			    </div>
			  </div> 
			  <div class="form-group row">
			    <label for="inputVendor" class="col-sm-2 col-form-label">Vendor</label>
			    <div class="col-sm-10">
			      <input readonly="true" name="vendor" type="text" class="form-control" id="inputVendor" placeholder="Vendor" value="{{$customer->vendor}}">
			    </div>
			  </div> 
			  <div class="form-group row">
			    <label for="inputContactPerson" class="col-sm-2 col-form-label">Contact Person</label>
			    <div class="col-sm-10">
			      <input readonly="true" name="cp" type="text" class="form-control" id="inputContactPerson" placeholder="Contact Person" value="{{$customer->cp}}">
			    </div>
			  </div> 
			  <div class="form-group row">
			    <label for="inputProvinsi" class="col-sm-2 col-form-label">Provinsi</label>
			    <div class="col-sm-10">
				    <select readonly="true" name="provinsi" class="form-control" id="inputProvinsi">
				    	@foreach ($provinsi as $key => $value)
	                    <option
	                    @if ($key == $customer->id_provinsi)
	                    selected="true"
	                    @endif
	                    value="{{ $key }}">{{ $value }}</option>
	                    @endforeach
					</select>
			    </div>
			  </div> 
			  <div class="form-group row">
			    <label for="inputKabupaten" class="col-sm-2 col-form-label">Kabupaten</label>
			    <div class="col-sm-10">
			     	<select readonly="true" name="kabupaten" class="form-control" id="inputKabupaten">
	  				@foreach ($kabupaten as $key => $value)
	                    <option
	                    @if ($key == $customer->id_kabupaten)
	                    selected="true"
	                    @endif
	                    value="{{ $key }}">{{ $value }}</option>
	                    @endforeach
					</select>
			    </div>
			  </div>  
			  <div class="form-group row">
			    <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
			    <div class="col-sm-10">
			       <textarea readonly="true" name="alamat" class="form-control" id="inputAlamat" rows="4">{{$customer->alamat}}</textarea>
			    </div>
			  </div>
            <!--a class="btn btn-primary btn-block" href="{{url('new/customer/save')}}">Register</a-->
            <button type="submit" class="btn btn-raised btn-danger pull-right col-md-12">Hapus</button>
            {{csrf_field()}}
          </form>
      </div>
  </div>
@endsection