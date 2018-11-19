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

          <form action="{{ url('save') }}" method="POST">
          	<div class="col-md-6">
          	  <div class="form-group row">
          <label for="inputSatuan" class="col-sm-4 col-form-label">Satuan</label>
          <div class="col-sm-8">
            <input name="satuan[]" type="text" class="form-control" id="inputSatuan" placeholder="Satuan Baru" value="{{old('satuan')}}">
              @if($errors->has('satuan'))
                <small class="form-text text-muted" >
                Nama Satuan Tidak Boleh Kosong
            </small>
          @endif
          </div>
        </div>   
        <div class="form-group row">
			    <label for="inputSatuan" class="col-sm-4 col-form-label">Satuan</label>
			    <div class="col-sm-8">
			      <input name="satuan[]" type="text" class="form-control" id="inputSatuan" placeholder="Satuan Baru" value="{{old('satuan')}}">
              @if($errors->has('satuan'))
                <small class="form-text text-muted" >
                Nama Satuan Tidak Boleh Kosong
            </small>
          @endif
			    </div>
			  </div> 
           <button type="submit" class="btn btn-raised btn-primary pull-right">Simpan</button>
            {{csrf_field()}}
        </div>
          </form>
          

@endsection