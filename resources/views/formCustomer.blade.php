@extends('layout.mylayout')

@section('title', 'Enol - New Customer')
@section('pageHeader','Form Tambah Customer')

@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">New Customer</li>
          </ol>
@endsection

@section('content')
		<div class="row">
		 <div class="col-md-6">
          <form action="{{ url('customer/save') }}" method="POST">

          	  <div class="form-group row">
			    <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
			    <div class="col-sm-10">
			      <input name="nama" type="text" class="form-control" id="inputNama" placeholder="Nama" value="{{old('nama')}}">
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
			      <input name="vendor" type="text" class="form-control" id="inputVendor" placeholder="Vendor" value="{{old('vendor')}}">
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
			      <input name="cp" type="text" class="form-control" id="inputContactPerson" placeholder="Contact Person" value="{{old('cp')}}">
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
				    	<option value="">--- Pilih Provinsi ---</option>
				    	@foreach ($provinsi as $key => $value)
	                    <option value="{{ $key }}">{{ $value }}</option>
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
	  				<option>-- Kabupaten --</option>
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
			       <textarea name="alamat" class="form-control" id="inputAlamat" rows="4" value="{{old('alamat')}}"></textarea>
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
       <div class="col-md-6">
            <table class="table table-bordered" id="users-table">
              <thead>
                <tr>
                    <th>Nama</th>
                    <th>Vendor</th>
                    <th>Cp</th>
                </tr>
              </thead>
            </table>
          </div>
  </div>
          
         @section('javascript')
          <script type="text/javascript">
			    jQuery(document).ready(function ()
			    {
			            jQuery('select[name="provinsi"]').on('change',function(){
			               var provinsiID = jQuery(this).val();

			               if(provinsiID)
			               {	
			                  jQuery.ajax({
			                     url : '/customer/getkab/' +provinsiID,
			                     type : "GET",
			                     dataType : "json",

			                     success:function(data)
			                     {
			                        //console.log(data);
			                        jQuery('select[name="kabupaten"]').empty();
			                        jQuery.each(data, function(key,value){
			                           $('select[name="kabupaten"]').append('<option value="'+ key +'">'+ value +'</option>');
			                        });
			                     }
			                  });
			               }
			               else
			               {
			               		console.log('kosong data');
			                  $('select[name="state"]').empty();
			               }
			            });
			    });

			    $(function() {
			      $('#users-table').DataTable({
			          processing: true,
			          serverSide: true,
			          ajax: '{{"/customer/json-form"}}',
			          columns: [
			              { data: 'customer_name', name: 'customer_name' },
			              { data: 'vendor', name: 'vendor' },
			              { data: 'cp', name: 'cp' },
			          ]
			      });
			  });


			    </script> 
			    @endsection 

@endsection