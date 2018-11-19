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
          
        <div class="row">
          <div class="col-md-6">
          <form action="{{ url('satuan/save') }}" method="POST">
          	
          	  <div class="form-group row">
			    <label for="inputSatuan" class="col-sm-4 col-form-label">Satuan</label>
			    <div class="col-sm-8">
			      <input name="satuan" type="text" class="form-control" id="inputSatuan" placeholder="Satuan Baru" value="{{old('satuan')}}">
              @if($errors->has('satuan'))
                <small class="form-text text-muted" >
                Nama Satuan Tidak Boleh Kosong
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
                    <th>Satuan</th>
                    <th>Waktu Pembuatan</th>
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
           order: [ [1, 'desc'] ],
          ajax: '{{"/satuan/json-form"}}',
          columns: [
              { data: 'satuan', name: 'satuan' },
              { data: 'created_at', name: 'created_at' }
          ]
      });
  });
  </script>
@endpush

@endsection