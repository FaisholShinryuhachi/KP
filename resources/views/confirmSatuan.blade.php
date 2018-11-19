@extends('layout.mylayout')

@section('title', 'Enol - Hapus Satuan')
@section('pageHeader','Form Hapus Satuan')


@section('breadcumb')
	 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li> 
            <li class="breadcrumb-item active">Hapus Satuan</li>
          </ol>
@endsection

@section('content')
          
        <div class="row">
          <div class="col-md-6">
          <form action="{{ url('satuan/delete') }}" method="POST">
          <div class="form-group row">
          <label for="id" class="col-sm-4 col-form-label">Id</label>
          <div class="col-sm-8">
            <input readonly="true" name="id" type="text" class="form-control" id="id" value="{{$satuan->id_satuan}}">
          </div>
        </div> 
          <div class="form-group row">
			    <label for="inputSatuan" class="col-sm-4 col-form-label">Satuan</label>
			    <div class="col-sm-8">
			      <input readonly="true" name="satuan" type="text" class="form-control" id="inputSatuan" placeholder="Satuan Baru" value="{{$satuan->satuan}}">
			    </div>
			  </div> 
           <button type="submit" class="btn btn-raised btn-danger pull-right col-md-12">Hapus</button>
            {{csrf_field()}}
       
          </form>
           </div>
        </div>
@endsection