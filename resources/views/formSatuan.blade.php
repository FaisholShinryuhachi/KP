@extends('layout.mylayout')

@section('title', 'Enol - New Satuan')
@section('pageHeader','Form Tambah Satuan')


@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li> 
            <li class="breadcrumb-item active">New Satuan</li>
          </ol>
@endsection

@section('content')

          <form>
          	<div class="col-md-6">
          	  <div class="form-group row">
			    <label for="inputSatuan" class="col-sm-4 col-form-label">Satuan</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="inputSatuan" placeholder="Satuan Baru">
			    </div>
			  </div> 
            <a class="btn btn-primary btn-block" href="login.html">Tambah</a>
        </div>
          </form>
          

@endsection